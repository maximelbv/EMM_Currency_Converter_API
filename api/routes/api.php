<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ApiStateController;
use App\Http\Controllers\PairController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/status', [ApiStateController::class, 'state']);

Route::get('/currencies', [CurrencyController::class, 'index']);
Route::get('/currencies/{id}', [CurrencyController::class, 'show']);
Route::post('/currencies', [CurrencyController::class, 'store']);
Route::put('/currencies/{id}', [CurrencyController::class, 'update']);
Route::delete('/currencies/{id}', [CurrencyController::class, 'destroy']);

Route::get('/convert/{amount}/from/{currencyOne}/to/{currencyTwo}', [PairController::class, 'convert']);

Route::get('/pairs', [PairController::class, 'index']);
Route::get('/pairs/from/{currencyOne}/to/{currencyTwo}', [PairController::class, 'show']);
Route::get('/pairs/count/from/{currencyOne}/to/{currencyTwo}', [PairController::class, 'getCount']);
Route::post('/pairs', [PairController::class, 'store']);
Route::put('/pairs/{id}', [PairController::class, 'update']);
Route::delete('/pairs/{id}', [PairController::class, 'destroy']);
