<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cats', CategorieController::class . '@getData');
Route::get('/categories', CategorieController::class . '@show');
Route::post('/storeCat', CategorieController::class . '@store');
Route::get('/fcts', FonctionController::class . '@getFonctions');
Route::post('/storeFonc', FonctionController::class . '@store');
Route::get('/cars', CarController::class . '@getCars');
Route::post('/storeCar', CarController::class . '@store');
