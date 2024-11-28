<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        $pecas = Part::with('supplier')->get();

        return view('pecas', compact('pecas'));
    }
}
