<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageCalculation;
use App\Http\Middleware\VerifyCsrfToken;
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

Route::get('/', function () {
    return view('welcome');
})->name('frontend.home');

Route::post('get-calculation', [ImageCalculation::class, 'index'])->name('frontend.getCalculation');
