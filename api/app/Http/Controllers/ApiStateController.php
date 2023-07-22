<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiPublicStateController extends Controller
{
    public function state()
    {
        return response(["data" => "API Status : 🟢 OK"], 200);
    }
}