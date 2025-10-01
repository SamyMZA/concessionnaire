<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\VoitureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/apropos', function () {
    return view('apropos');
}); 
Route::get('/apropos', function () {
    return view('apropos');
}); */

Route:: get ('/', [VoitureController::class, 'index']);

Route::resources([
                 'voiture'=> VoitureController::class,
                 'achat'=> AchatController::class,
                ]);


/*  Route::controller(VoitureController::class)->group(function () {
    
       Route::get('/', 'index');
       Route::get('/voitures/create', 'create');
       Route::get('/voitures/{id}', 'show');
       Route::get('/voitures/{id}/edit', 'edit');
     
   
       Route::post('/voitures', 'store');
       Route::patch('/voitures/{id}', 'update');
       Route::delete('/voitures/{id}', 'destroy');
      
   });  */
