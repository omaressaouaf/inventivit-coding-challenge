<?php

use App\Http\Controllers\Calculator\CalculateController;
use App\Http\Controllers\Calculator\ShowCalculatorController;
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

Route::redirect('/', "/calculator");

Route::get("/calculator", ShowCalculatorController::class)->name("calculator.show");
Route::post("/calculator", CalculateController::class)->name("calculator.calculate");
