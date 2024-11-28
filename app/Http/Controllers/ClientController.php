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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        
        $cliente = new Client();
            $cliente->name = $request->name;
            $cliente->cpf = $request->cpf;
            $cliente->phone = $request->phone;
            $cliente->email = $request->email;
            $cliente->zipCode = $request->zipCode;
            $cliente->address = $request->address;
            $cliente->number = $request->number;
            $cliente->neighborhood = $request->neighborhood;
        $cliente->save();   

        return redirect()->route('clientes.index');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $cliente = Client::findOrFail($id);
            $cliente->name = $request->name;
            $cliente->cpf = $request->cpf;
            $cliente->phone = $request->phone;
            $cliente->email = $request->email;
            $cliente->zipCode = $request->zipCode;
            $cliente->address = $request->address;
            $cliente->number = $request->number;
            $cliente->neighborhood = $request->neighborhood;
        $cliente->save();   

        return redirect()->route('clientes.index')->with('success', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $cliente = Client::findOrFail($id);
        $cliente->delete();  

        return redirect()->route('clientes.index');
    }


}
