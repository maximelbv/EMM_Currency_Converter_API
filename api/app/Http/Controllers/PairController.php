<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use App\Http\Requests\StorePairsRequest;
use App\Http\Requests\UpdatePairsRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class PairController extends Controller
{
    public function index()
    {
        try {
            $pairs = Pair::with('currencyFrom', 'currencyTo')->get();

            $pairs->transform(function ($pair) {
                return [
                    'from' => $pair->currencyFrom->code,
                    'to' => $pair->currencyTo->code,
                    'conversion_rate' => $pair->conversion_rate,
                ];
            });

            return response()->json(['pairs' => $pairs], 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    public function create()
    {}

    public function store(StorePairsRequest $request)
    {}

    public function show(Pair $Pair)
    {}

    public function edit(Pair $Pair)
    {}

    public function update(UpdatePairsRequest $request, Pair $Pair)
    {}

    public function destroy(Pair $Pair)
    {}

    public function getConvertedDataFromPair(Request $request)
    {
        try {
            $request->validate([
                'from' => 'required|exists:currencies,code',
                'to' => 'required|exists:currencies,code',
                'amount' => 'required|numeric'
            ]);
            $fromCurrencyCode = $request->input('from');
            $toCurrencyCode = $request->input('to');
            $amoutToConvert = $request->input('amount');

            $fromCurrency = Currency::where('code', $fromCurrencyCode)->firstOrFail();
            $toCurrency = Currency::where('code', $toCurrencyCode)->firstOrFail();

            $conversionRatefromPair = Pair::select(['conversion_rate', 'id'])->where('from_currency_id', $fromCurrency->id)->where('to_currency_id', $toCurrency->id)->firstOrFail();

            $convertedValue =  $conversionRatefromPair->conversion_rate * $amoutToConvert;
            $pair = Pair::where('id', $conversionRatefromPair->id)->firstOrFail();
            $pair->count += 1;
            $pair->update();

            return response()->json([
                ["converted_value" => $convertedValue], 200
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    public function getCountByCurrenciesCode(Request $request)
    {
        try {
            $request->validate([
                'from' => 'required|exists:currencies,code',
                'to' => 'required|exists:currencies,code',
            ]);
            $fromCurrencyCode = $request->input('from');
            $toCurrencyCode = $request->input('to');
            $fromCurrency = Currency::where('code', $fromCurrencyCode)->firstOrFail();
            $toCurrency = Currency::where('code', $toCurrencyCode)->firstOrFail();

            $pairFounded = Pair::select(['count'])->where('from_currency_id', $fromCurrency->id)->where('to_currency_id', $toCurrency->id)->firstOrFail();
            return response()->json(['count' => $pairFounded->count]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }
}