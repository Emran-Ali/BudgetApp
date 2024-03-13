<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\IncomeController;
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
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::get('/register', [UserController::class, 'create']);
    Route::post('/user/auth', [UserController::class, 'authenticate']);
    Route::post('/user', [UserController::class, 'store']);
});
//__auth middleware Group__
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('incomes', [IncomeController::class,'index']);
    Route::post('/incomes/store', [IncomeController::class,'store']);
    Route::get('/expenses', [ExpenseController::class,'index']);
    Route::post('/expenses/store', [ExpenseController::class,'store']);
    Route::post('/add-budget', [BudgetController::class,'addBudget']);
    Route::delete('/incomes/{id}', [IncomeController::class,'destroy']);
    Route::delete('/expenses/{id}', [ExpenseController::class,'destroy']);


//    Route::resource('incomes', IncomeController::class);
//    Route::resource('expenses', [ExpenseController::class]);

    Route::get('budgets', function () {
        return view('components/budget-form');
    });
    Route::get('/dashboard', [UserController::class, 'index']);
});


