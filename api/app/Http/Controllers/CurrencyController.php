<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{

    public function index()
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
                    'currencies' => 'No currencies found'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    public function show($id)
    {
        try {
            $currency = Currency::find($id);
            if($currency) {
                return response()->json([
                    'status' => 200,
                    'currency' => $currency
                ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'currencies' => 'No currencies found'
                    ]);
                }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }

    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'code' => 'required|max:3',
            ]);
            if($validate->fails()){
                return response()->json(['message' => 'Validation failed', 'errors' => $validate->errors()], 422);
            } else {
                if (Currency::where(['code' => $request->get('code')])->exists()) {
                    return response()->json([
                        'status' => 409,
                        'currency' => 'This currency already exists'
                    ]);
                } else {
                    $currency = Currency::create($request->all());
                    return response()->json($currency);
                }
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
       
    }

    public function update(Request $request, int $id)
    {
        try {
            $validate = Validator::make($request->all(), [
                'code' => 'max:3',
            ]);
            if($validate->fails()){
                return response()->json(['message' => 'Validation failed', 'errors' => $validate->errors()], 422);
            }
            $currency = Currency::find($id);
            if ($currency) {
                if (Currency::where(['code' => $request->get('code')])->exists()) {
                    return response()->json([
                        'status' => 409,
                        'currency' => 'This currency already exists'
                    ]);
                } else {
                    $currency->update($request->all());
                    return response()->json($currency);
                }
            } else {
                return response()->json([
                    'status' => 409,
                    'currency' => 'Currency not found'
                ]);
            }

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    public function destroy(Currency $currency)
    {
        try {

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }
}