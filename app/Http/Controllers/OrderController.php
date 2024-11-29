<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Part;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $pedidos = Order::with('client', 'part', 'service')->get();

        $pedidos = $pedidos->map(function ($order) {
            $partsDetails = $order->part->map(function ($part) {
                $quantity = $part->pivot->quantity;
                $price = $part->sellingPrice;
                $totalPrice = $price * $quantity;

                return "{$part->name} x{$quantity}: R$" . number_format($totalPrice, 2, ',', '.');
            })->join('; <br> ');

            $servicesDetails = $order->service->map(function ($service) {
                $quantity = $service->pivot->quantity;
                $price = $service->price;
                $totalPrice = $price * $quantity;

                return "{$service->name} x{$quantity}: R$" . number_format($totalPrice, 2, ',', '.');
            })->join('; <br> ');

            $total = $order->part->sum(function ($part) {
                return ($part->sellingPrice) * $part->pivot->quantity;
            }) + $order->service->sum(function ($service) {
                return ($service->price) * $service->pivot->quantity;
            });

            return [
                'id' => $order->id,
                'status' => $order->status,
                'client' => $order->client->name,
                'parts' => $partsDetails,
                'services' => $servicesDetails,
                'total' => number_format($total, 2, ',', '.'),
            ];
        });

        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $clients = Client::all();
        $parts = Part::all();
        $services = Service::all();

        return view('pedidos.form', compact('clients', 'parts', 'services'));
    }

    public function store(Request $request)
    {
        // Validação do formulário
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|in:pending,completed,canceled',
            'parts' => 'nullable|array',
            'parts.*.id' => 'exists:parts,id',
            'parts.*.quantity' => 'required|integer|min:1',
            'services' => 'nullable|array',
            'services.*.id' => 'exists:services,id',
            'services.*.quantity' => 'required|integer|min:1',
        ]);

        // Criar pedido
        $order = Order::create([
            'client_id' => $validated['client_id'],
            'status' => $validated['status'],
        ]);

        // Anexar as peças ao pedido
        if (!empty($validated['parts'])) {
            foreach ($validated['parts'] as $part) {
                $order->part()->attach($part['id'], ['quantity' => $part['quantity']]);
            }
        }

        // Anexar os serviços ao pedido
        if (!empty($validated['services'])) {
            foreach ($validated['services'] as $service) {
                $order->service()->attach($service['id'], ['quantity' => $service['quantity']]);
            }
        }

        return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function show($id)
    {
        $pedido = Order::with('client', 'part', 'service')->findOrFail($id);

        return view('pedidos.show', compact('pedido'));
    }

    public function edit($id)
    {
        $order = Order::with('part', 'service', 'client')->findOrFail($id);
        $clients = Client::all();
        $parts = Part::all();
        $services = Service::all();

        return view('pedidos.form', compact('order', 'clients', 'parts', 'services'));
    }

    public function update(Request $request, $id)
    {
        $pedido = Order::findOrFail($id);

        // Validação do formulário
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|in:pending,completed,canceled',
            'parts' => 'nullable|array',
            'parts.*.id' => 'exists:parts,id',
            'parts.*.quantity' => 'required|integer|min:1',
            'services' => 'nullable|array',
            'services.*.id' => 'exists:services,id',
            'services.*.quantity' => 'required|integer|min:1',
        ]);

        // Atualizar o pedido
        $pedido->update([
            'client_id' => $validated['client_id'],
            'status' => $validated['status'],
        ]);

        // Atualizar as peças do pedido
        $pedido->part()->sync([]);
        if (!empty($validated['parts'])) {
            foreach ($validated['parts'] as $part) {
                $pedido->part()->attach($part['id'], ['quantity' => $part['quantity']]);
            }
        }

        // Atualizar os serviços do pedido
        $pedido->service()->sync([]);
        if (!empty($validated['services'])) {
            foreach ($validated['services'] as $service) {
                $pedido->service()->attach($service['id'], ['quantity' => $service['quantity']]);
            }
        }

        return redirect()->route('pedidos.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $pedido = Order::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido deletado com sucesso!');
    }
}
