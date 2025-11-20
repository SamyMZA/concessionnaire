<?php

use App\Http\Controllers\Api\VoitureController;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\RegisterController;
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

//Route::apiResource('/voitures',VoitureController::class);

Route::post('register',[RegisterController::class, 'register']);
Route::post('login',[RegisterController::class, 'login']);
Route::post('logout', [RegisterController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/voitures', [VoitureController::class, 'index']);
Route::get('voitures/autocomplete', [VoitureController::class, 'autocomplete'])->name('autocomplete');

Route::get('/voitures/{id}',[VoitureController::class, 'show']);


Route::middleware('auth:sanctum')->group(function() {
    
    Route:: post ('voitures/', [VoitureController::class, 'store']); 
    Route:: get ('voitures/edit/{id}', [VoitureController::class, 'edit']); 
    Route:: patch ('voitures/update/{id}', [VoitureController::class, 'update']); 
    Route:: delete ('voitures/{id}', [VoitureController::class, 'destroy']); 
    
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
