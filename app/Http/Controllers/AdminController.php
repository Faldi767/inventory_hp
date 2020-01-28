<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class AdminController extends Controller
{
    public function index() {
        $client = Client::all();
        return view('index', ['client' => $client]);
    }
}
