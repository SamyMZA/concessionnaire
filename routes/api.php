<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\VoitureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register',[RegisterController::class, 'register']);

Route::post('login',[RegisterController::class, 'login']);
Route::get('/voitures',[VoitureController::class, 'index']);
Route::get('/voitures/{id}',[VoitureController::class, 'show']);


Route::middleware('auth:sanctum')->group(function() {
    
    Route:: post ('voitures/', [VoitureController::class, 'store']); 
    Route:: get ('voitures/{id}/edit', [VoitureController::class, 'edit']); 
    Route:: patch ('voitures/{voiture}/update', [VoitureController::class, 'update']); 
    Route:: delete ('voitures/{id}', [VoitureController::class, 'destroy']); 
    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
