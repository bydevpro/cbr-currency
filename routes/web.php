<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CbrCurrencyController;
use App\Http\Controllers\RefreshData;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', function(){
    if(Auth::check()){
        return redirect (route('user.callback'));
    }
    return view('login');
})->name('login');
Route::get('/', [CbrCurrencyController::class, 'index'])->middleware('auth')->name('index');
Route::get('/getdata', [RefreshData::class, 'get']);
Route::post('/registration', [\App\Http\Controllers\UserRegistration::class, 'registrator'])->name('registration');

Route::post('/login', [\App\Http\Controllers\UserLogin::class, 'login']);
Route::get('/logout', function(){
        Auth::logout();
        return redirect ('/login');
    });