<?php

use App\Http\Controllers\PhoneController;
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

Route::get('/', [PhoneController::class, 'index'])->name('phone-number.index');
Route::get('/phone-number', [PhoneController::class, 'index'])->name('phone-number.index');
Route::post('/phone-number', [PhoneController::class, 'store'])->name('phone-number.store');
Route::delete('/phone-number/{id}', [PhoneController::class, 'destroy'])->name('phone-number.destroy');
