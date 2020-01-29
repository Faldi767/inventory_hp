<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Brand;
use App\Toko;

class AdminController extends Controller
{
    public function index() {
        $client = Client::all();
        $brand = Brand::all();
        $toko = Toko::all();
        return view('index', ['client' => $client, 'brand' => $brand, 'toko' => $toko]);
    }
}
