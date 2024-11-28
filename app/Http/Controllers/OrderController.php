<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $pedidos = Order::with('client', 'part', 'service')->get();

        $pedidos = $pedidos->map(function ($order) {
            $partsDetails = $order->part->map(function ($part) {
                $quantity = $part->pivot->quantity;
                $price = $part->sellingPrice / 100;
                $totalPrice = $price * $quantity;
    
                return "{$part->name} x{$quantity}: R$" . number_format($totalPrice, 2, ',', '.');
            })->join(', <br> ');
    
            $servicesDetails = $order->service->map(function ($service) {
                $quantity = $service->pivot->quantity;
                $price = $service->price / 100;
                $totalPrice = $price * $quantity;
    
                return "{$service->name} x{$quantity}: R$" . number_format($totalPrice, 2, ',', '.');
            })->join(', <br> ');
    
            $total = $order->part->sum(function ($part) {
                return ($part->sellingPrice / 100) * $part->pivot->quantity;
            }) + $order->service->sum(function ($service) {
                return ($service->price / 100) * $service->pivot->quantity;
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
}