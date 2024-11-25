<?php

use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/validate-token', [AuthController::class, 'validateToken']);

    //Route::get('/users', [AuthController::class, 'index']);
    Route::get('/transactions/balance', [TransactionController::class, 'getBalanceByCategory']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/account-types', [AccountTypeController::class, 'index']);

    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::get('/transactions/category/{category}', [TransactionController::class, 'getTransactionsByCategory']);
    Route::get('/transactions/account-type/{accountType}', [TransactionController::class, 'getTransactionsByAccountType']);

    Route::get('/transactions/total-balance', [TransactionController::class, 'getTotalBalance']);
    Route::get('/transactions/total-investments', [TransactionController::class, 'getTotalInvestments']);
    Route::get('/transactions/total-expenses', [TransactionController::class, 'getTotalExpenses']);
    Route::get('/transactions/total-income', [TransactionController::class, 'getTotalIncome']);


    Route::post('/transactions/new', [TransactionController::class, 'store']);
    Route::put('/transactions/update/{id}', [TransactionController::class, 'update']);
    Route::delete('/transactions/delete/{id}', [TransactionController::class, 'destroy']);
});
