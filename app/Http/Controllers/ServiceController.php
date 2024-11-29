<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $servicos = Service::all();
        return view('servicos.index', compact('servicos'));
    }

    public function create()
    {
        return view('servicos.form');
    }

    public function store(Request $request)
    {
        Service::create($request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0', // Armazena o preço como inteiro (em centavos)
            'spendingTime' => 'required|integer|min:0', // Tempo em horas ou outro formato definido
            'description' => 'nullable|string|max:1000',
        ]));

        return redirect()->route('servicos.index')->with('success', 'Serviço criado com sucesso!');
    }

    public function show($id)
    {
        $data = Service::findOrFail($id);
        return view('servicos.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Service::findOrFail($id);
        return view('servicos.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $servico = Service::findOrFail($id);

        $servico->update($request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0', // Atualiza preço como inteiro
            'spendingTime' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
        ]));

        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $servico = Service::findOrFail($id);
        $servico->delete();

        return redirect()->route('servicos.index')->with('success', 'Serviço deletado com sucesso!');
    }
}
