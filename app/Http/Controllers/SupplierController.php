<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $fornecedores = Supplier::all();

        return view('fornecedores.index', compact('fornecedores'));
    }
}
