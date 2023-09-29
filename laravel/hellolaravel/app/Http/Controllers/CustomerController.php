<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index()
    {
        return view('customers.index');
    }
    function create()
    {
        return view('customers.create');
    }
    function store(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        return view('customers.create-success', compact('username', 'password'));
    }
}
