<?php

use App\Http\Controllers\PobleController;
use Illuminate\Support\Facades\Route;

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


Route::get('/savedata', [App\Http\Controllers\ApiController::class, 'saveDataFromAPI']);


Route::get('/', [App\Http\Controllers\ApiController::class, 'pobles']);

Route::get('/img', [App\Http\Controllers\ApiController::class, 'saveImg']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('poble');

Route::resource('poble', PobleController::class);
