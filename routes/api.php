<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/validate-token', [AuthController::class, 'validateToken']);

    // Rotas de usuários
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    // Rotas de transações
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transaction.store');
    Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transaction.destroy');

    // Rotas de contas
    Route::get('/accounts', [AccountController::class, 'index'])->name('account.index');
    Route::get('/accounts/{account}', [AccountController::class, 'show'])->name('account.show');
    Route::post('/accounts', [AccountController::class, 'store'])->name('account.store');
    Route::put('/accounts/{account}', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/accounts/{account}', [AccountController::class, 'destroy'])->name('account.destroy');

    // Rotas de receitas (incomes)
    Route::get('/incomes', [IncomeController::class, 'index'])->name('income.index');
    Route::get('/incomes/{income}', [IncomeController::class, 'show'])->name('account.show');
    Route::post('/incomes', [IncomeController::class, 'store'])->name('account.store');
    Route::put('/incomes/{income}', [IncomeController::class, 'update'])->name('account.update');
    Route::delete('/incomes/{income}', [IncomeController::class, 'destroy'])->name('account.destroy');

    // Rotas de despesas (expenses)
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expense.index');
    Route::get('/expenses/{expense}', [ExpenseController::class, 'show'])->name('expense.show');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expense.store');
    Route::put('/expenses/{expense}', [ExpenseController::class, 'update'])->name('expense.update');
    Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expense.destroy');

    Route::apiResource('users', UserController::class);
    Route::apiResource('accounts', AccountController::class);
    Route::apiResource('expenses', ExpenseController::class);
    Route::apiResource('incomes', IncomeController::class);
    Route::apiResource('transactions', TransactionController::class);
});