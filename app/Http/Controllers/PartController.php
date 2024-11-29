<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        $pecas = Part::all();
        return view('pecas.index', compact('pecas'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('pecas.form', compact('suppliers'));
    }

    public function store(Request $request)
    {
        Part::create($request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:parts,code',
            'costPrice' => 'required|numeric|min:0',
            'sellingPrice' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'supplier_id' => 'required|exists:suppliers,id',
        ]));

        return redirect()->route('pecas.index')->with('success', 'Peça criada com sucesso!');
    }

    public function show($id)
    {
        $data = Part::findOrFail($id);
        return view('pecas.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Part::findOrFail($id);
        $suppliers = Supplier::all();
        return view('pecas.form', compact('data', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $peca = Part::findOrFail($id);

        $peca->update($request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:parts,code,' . $id, // Exclui o atual do check de unicidade
            'costPrice' => 'required|numeric|min:0',
            'sellingPrice' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'supplier_id' => 'required|exists:suppliers,id',
        ]));

        return redirect()->route('pecas.index')->with('success', 'Peça atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $peca = Part::findOrFail($id);
        $peca->delete();

        return redirect()->route('pecas.index')->with('success', 'Peça deletada com sucesso!');
    }
}
