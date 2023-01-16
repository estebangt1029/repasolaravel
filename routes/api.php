<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'films','middleware' => ['auth','role:admin']], function () {
    Route::post('', [FilmController::class, 'create']);
    Route::get('', [FilmController::class, 'index']);
    Route::put('/{id}', [FilmController::class, 'update']);
    Route::get('/{id}', [FilmController::class, 'show']);
    Route::delete('/{id}', [FilmController::class, 'destroy']);
});

Route::group(['prefix' => 'films','middleware' => ['auth','role:cliente']], function () {
    
    Route::get('', [FilmController::class, 'index']);
    Route::get('/{id}', [FilmController::class, 'show']);
   
});


