<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
      try {
        {
          $validate = Validator::make($request->all(), [
              'email' => 'required|email',
              'password' => 'required',
          ]);
          if ($validate->fails()) {
              return response()->json(['message' => 'Validation failed', 'errors' => $validate->errors()], 403);
          }
  
          $user = User::where('email', $request->email)->first();
          if (!$user) {
              return response()->json(['errors' => 'Wrong credentials'],401);
          }
  
          $password = $request->password;
          if (!Hash::check($password, $user->password)){
              return response()->json(['errors' => 'Wrong credentials'], 403);
          }
  
          $token = $user->remember_token;
  
          return response()->json(['accessToken' => $token], 202);
      }
      } catch (\Throwable $th) {
          return response()->json($th->getMessage(), $th->getCode());
      }
    }
    public function logout()
    {
      try {

      } catch (\Throwable $th) {
          return response()->json($th->getMessage(), $th->getCode());
      }
    }
}