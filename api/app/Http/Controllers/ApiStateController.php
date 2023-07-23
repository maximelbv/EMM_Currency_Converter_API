<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiStateController extends Controller
{
    public function state()
    {
        try {
            return response()->json([
                'status' => 200,
                'message' => 'API Status : 🟢 OK'
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
        

    }
}