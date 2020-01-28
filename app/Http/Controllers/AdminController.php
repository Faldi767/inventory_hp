<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;

class AdminController extends Controller
{
    public function index() {
        $role = Role::all();
        return view('index', ['role' => $role]);
    }
}
