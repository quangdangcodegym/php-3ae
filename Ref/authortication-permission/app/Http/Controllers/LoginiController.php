<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginiController extends Controller
{
    function index()
    {
        return view('logini.index');
    }
}
