<?php

use App\Http\Controllers\IncomeCostController;
use App\Http\Controllers\UserController;
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

//__guest middleware group__
Route::middleware(['guest'])->group(function () {
Route::get('/', function () {
    return view('layouts.greating');
});
Route::get('/login', [UserController::class,'login'])->name('login');
Route::get('/register', [UserController::class,'create']);
Route::post('/user/auth', [UserController::class,'authenticate']);
Route::post('/user', [UserController::class,'store']);
});
//__auth middleware Group__
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class,'logout']);
    Route::post('/add-income', [IncomeCostController::class,'addIncome']);
    Route::post('/add-cost', [IncomeCostController::class,'addCost']);
    Route::get('/dashboard/income', function () {
        return view('components/income-form');
    });
    Route::get('/dashboard/cost', function () {
        return view('components/cost-form');
    });
    Route::get('/dashboard',[IncomeCostController::class,'show']);
});


