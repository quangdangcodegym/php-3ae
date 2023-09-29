<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function index(Request $request)
    {
        // Log::debug($request->user()->getRoleNames());
        Log::debug("aaaaaaaa");
        return response()->json([
            'data' => User::all(),
        ]);
    }
}
