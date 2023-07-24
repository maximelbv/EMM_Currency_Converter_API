<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Pair;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PairController extends Controller
{

    public function index()
    {
        try {
            $pairs = Pair::all();
            if($pairs->count() > 0) {
                        return response()->json([
                'status' => 200,
                'pairs' => $pairs
            ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No pairs found'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    public function show($currencyOne, $currencyTwo)
    {
        try {
            $currencyIdFrom = Currency::where('code', $currencyOne)->first()->id;
            $currencyIdTo = Currency::where('code', $currencyTwo)->first()->id;

            $pair = Pair::where([
                'from_currency_id' => $currencyIdFrom, 
                'to_currency_id' => $currencyIdTo
            ])->get();

            if($pair->count() > 0) {
                return response()->json([
                    'status' => 200,
                    'pair' => $pair
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No pairs found'
                ]);
            };
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    public function getCount($currencyOne, $currencyTwo)
    {
        try {
            $currencyIdFrom = Currency::where('code', $currencyOne)->first()->id;
            $currencyIdTo = Currency::where('code', $currencyTwo)->first()->id;

            $pair = Pair::where([
                'from_currency_id' => $currencyIdFrom, 
                'to_currency_id' => $currencyIdTo
            ])->get('count');

            if($pair->count() > 0) {
                return response()->json([
                    'status' => 200,
                    'data' => $pair[0]
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No pairs found'
                ]);
            };
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    // public function convert(Request $request)
    // {
    //     try {
            
    //         $validate = Validator::make($request->all(), [
    //             'from' => 'required|alpha',
    //             'to' => 'required|alpha',
    //             'amount' => 'required|min:0',
    //             'reverse'=>'required|boolean'
    //         ]);
    //         if($validate->fails()){
    //             return response()->json(['message' => 'Validation failed', 'errors' => $validate->errors()], 422);
    //         }

    //         $from=$request->query('from');
    //         $to=$request->query('to');

    //         $currencyFrom = Currency::getByName($from)->first();
    //         $currencyTo = Currency::getByName($to)->first();
    //         $amount = $request->query('amount') ?? 1;
    //         $reverse=$request->query('reverse');

    //         if (!$currencyFrom || !$currencyTo) return response()->json(['error' => 'no existing currency'], 404);
    //         if ($from == $to) return response()->json(['error' => 'You are trying to convert to the same currency'], 400);

    //         $pairs = Pair::getPairsByCurrencies($currencyFrom, $currencyTo);
    //         if ($pairs == null) return response()->json(['error' => 'Pairs not found'], 404);


    //         if($reverse == true) {
    //             $converted = $amount * 1/$pairs->rate;
    //             $data = [
    //                 'amount' => $amount,
    //                 'currencyFrom' => $request->query('to'),
    //                 'currencyTo' => $request->query('from'),
    //                 'amountConverted' => $converted,

    //             ];
    //         }else {
    //             $converted = $amount * $pairs->rate;

    //             $data = [
    //                 'amount' => $amount,
    //                 'currencyFrom' => $request->query('from'),
    //                 'currencyTo' => $request->query('to'),
    //                 'amountConverted' => $converted,

    //             ];
    //         }

    //         return response()->json(['message' => 'Convert success', $data],200);

    //     } catch (\Throwable $th) {
    //         return response()->json($th->getMessage(), $th->getCode());
    //     }

    // }

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
            if (Pair::where([
                'from_currency_id' => $request->get('from_currency_id'),
                'to_currency_id' => $request->get('to_currency_id'),
                ])->exists()) {
                    return response()->json([
                        'status' => 409,
                        'message' => 'This pair already exists'
                    ]);
                } else {
                    $pair = Pair::create($request->all());
                    return response()->json($pair);
                }

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
        
    }

    public function update(Request $request, int $id)
    {
        try {
            $pair = Pair::find($id);
            if ($pair) {             
                $pair->update($request->all());
                return response()->json([
                    'status' => 200,
                    'pair modified' => $pair
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Pair not found'
                ]);
            }

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    public function destroy($id)
    {
        try {
            $pair = Pair::find($id);

            if($pair) {
                $pair->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Successfully deleted',
                    'entry deleted' => $pair
                ]);
            } else {
                return response()->json([
                    'status' => 409,
                    'message' => 'Pair not found'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }

    }

}