<?php

use App\Http\Controllers\BmiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BmiController::class, 'index'])->name('bmi.index');
Route::post('/calculate', [BmiController::class, 'store'])->name('bmi.store');
