<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\VoitureController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route:: get ('/', [VoitureController::class, 'index']);
Route::post('/autocomplete', [VoitureController::class,'autocomplete'])->name('autocomplete');
Route::get('/lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);

Route::controller(VoitureController::class)->group(function () {
    Route::get('/voitures/{id}', 'show');
});

Route::resources([
                //  'voitures'=> VoitureController::class,
                 'achats'=> AchatController::class,
                ]);

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/email/verify', function () { 
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request){
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth','signed'])->name('verification.verify');

Route::post('/email/verification-notification', function(Request $request){
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message','Verification link sent!');
})->middleware(['auth','throttle:6,1'])->name('verification.send');


Route:: get ('/admin/voitures', [VoitureController::class, 'index'])->middleware('admin')->name('voitures.index');

Route:: get ('/admin/voitures/create', [VoitureController::class, 'create'])->middleware('admin')->name('voitures.create');
Route:: post ('/admin/voitures/store', [VoitureController::class, 'store'])->middleware('admin')->name('voitures.store'); 
Route:: get ('/admin/voitures/{id}', [VoitureController::class, 'show'])->middleware('admin')->name('voitures.show'); 
Route:: get ('/admin/voitures/{id}/edit', [VoitureController::class, 'edit'])->middleware('admin')->name('voitures.edit'); 
Route:: patch ('/admin/voitures/{voiture}/update', [VoitureController::class, 'update'])->middleware('admin')->name('voitures.update'); 
Route:: delete ('/admin/voitures/{id}', [VoitureController::class, 'destroy'])->middleware('admin')->name('voitures.destroy'); 