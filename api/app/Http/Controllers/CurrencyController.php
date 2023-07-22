<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;

class CurrencyController extends Controller
{

    public function index()
    {
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

    }

    public function create()
    {}

    // public function store(StoreCurrencyRequest $request)
    // {}

    public function show(Currency $currency)
    {}

    public function edit(Currency $currency)
    {}

    // public function update(UpdateCurrencyRequest $request, Currency $currency)
    // {}

    public function destroy(Currency $currency)
    {}
}