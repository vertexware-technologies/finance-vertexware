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

    Route::get('/users', [AuthController::class, 'index']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/account-types', [AccountTypeController::class, 'index']);

    Route::get('/transactions/{user}', [TransactionController::class, 'index']);
    Route::get('/transactions/user/{user}/category/{category}', [TransactionController::class, 'getTransactionsByCategory']);
    Route::get('/transactions/user/{user}/account-type/{accountType}', [TransactionController::class, 'getTransactionsByAccountType']);

    Route::post('/transactions/user/{user}', [TransactionController::class, 'store']);
    Route::put('/transactions/user/{user}/transaction/{transaction}', [TransactionController::class, 'update']);
    Route::delete('/transactions/user/{user}/transaction/{transaction}', [TransactionController::class, 'destroy']);
});
