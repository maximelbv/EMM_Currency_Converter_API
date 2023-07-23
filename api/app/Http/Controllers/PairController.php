<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pair;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PairController extends Controller
{

    public function index()
    {
        try {
            $pairs = Pair::with('from_currency_id', 'to_currency_id')->get();
            if($pairs->count() > 0) {
                        return response()->json([
                'status' => 200,
                'currencies' => $pairs
            ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'currencies' => 'No records found'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    public function show()
    {
        try {

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'from_currency_id' => 'required',
                'to_currency_id' => 'required',
                'conversion_rate' => 'required',
            ]);
            if($validate->fails()){
                return response()->json(['message' => 'Validation failed', 'errors' => $validate->errors()], 422);
            }
            $pair = Pair::create($request->all());
            return response()->json($pair);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
        
    }

    public function update(Request $request, $id)
    {
        try {

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    public function destroy($id)
    {
        try {
            $pairs = Pair::find($id);
            $pairs->delete();
            return response()->json(['message'=>'Succesfully deleted']);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }

    }

}