<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiStateController extends Controller
{
    public function state()
    {
        return response()->json([
            'status' => 200,
            'message' => 'API Status : 🟢 OK'
        ]);
    }
}