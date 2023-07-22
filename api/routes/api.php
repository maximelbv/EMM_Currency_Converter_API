<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurrencyController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/pairs', [PairController::class, 'index']);
Route::get('/count', [PairController::class, 'getCountByCurrenciesCode']);
Route::get('/convertion', [PairController::class, 'getConvertedDataFromPair']);
Route::get('/ping', [ApiStateController::class, 'serverStatus']);