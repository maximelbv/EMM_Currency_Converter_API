<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{

    public function show()
    {
        try {
            $currencies = Currency::all();
            if($currencies->count() > 0) {
                        return response()->json([
                'status' => 200,
                'currencies' => $currencies
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

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required|max:3',
        ]);
        if($validate->fails()){
            return response()->json(['message' => 'Validation failed', 'errors' => $validate->errors()], 422);
        } else {
            $currency = Currency::create($request->all());
            return response()->json($currency);
        }
    }

    public function update(Currency $currency)
    {}

    public function destroy(Currency $currency)
    {}
}