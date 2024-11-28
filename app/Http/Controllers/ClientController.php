<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index()
    {
        $clientes = Client::all();

        return view('clientes', compact('clientes'));
    }
}
