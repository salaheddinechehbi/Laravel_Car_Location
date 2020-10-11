<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VedengeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\HomeController;
use App\Models\Categorie;
use App\Models\User;
/*
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


Route::group(['middleware' => ['auth']], function () {

    Route::get('/categorie/{q?}', CategorieController::class . '@searchCat');
    Route::get('/categorie/{categorie}/edit', CategorieController::class . '@edit');
    Route::put('/categorie/{categorie}/edit', CategorieController::class . '@update');
    Route::delete('/categorie/{categorie}/delete', CategorieController::class . '@destroy');
    Route::post('/categorie/store', CategorieController::class . '@store');
    Route::get('/categories', [CategorieController::class, 'index']);

    Route::get('/fonctions', [FonctionController::class, 'index']);
    Route::get('/fonction/{fonction}/edit', FonctionController::class . '@edit');
    Route::put('/fonction/{fonction}/edit', FonctionController::class . '@update');
    Route::delete('/fonction/{fonction}/delete', FonctionController::class . '@destroy');
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/', function () {
        $categories = User::all();
        return view('welcome', compact('categories'));
    })->withoutMiddleware('auth');

});
 




Route::get('/error', [HomeController::class, 'error']);



Auth::routes();

