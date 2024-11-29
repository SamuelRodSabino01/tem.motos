<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index()
    {
        $clientes = Client::all();

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.form');
    }

    public function edit($id)
    {
        $data = Client::findOrFail($id);

        return view('clientes.form', compact('data'));
    }

    public function store(Request $request)
    {
        Client::create($request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'nullable|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'zipCode' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:10',
            'neighborhood' => 'nullable|string|max:255',
        ]));

        return redirect()->route('clientes.index');
    }


    public function update(Request $request, $id)
    {
        $cliente = Client::findOrFail($id);
        $cliente->update($request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'nullable|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'zipCode' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:10',
            'neighborhood' => 'nullable|string|max:255',
        ]));

        return redirect()->route('clientes.index')->with('success', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $cliente = Client::findOrFail($id);
        $cliente->delete();  

        return redirect()->route('clientes.index')->with('success', 'Deletado com sucesso!');
    }
}
