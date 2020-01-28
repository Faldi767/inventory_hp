<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Client;

class ClientController extends Controller
{
    public function index() 
    {
        $client = Client::all();
        return view('index', ['client' => $client]);
    }
}
