<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\AccountType\Create;
use App\Livewire\Transactions\Dashboard;
use App\Livewire\Transactions\TransactionIndex;
use Illuminate\Support\Facades\Route;

// Rota inicial para a página de boas-vindas
Route::view('/', 'welcome')->name('welcome');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/profile', 'profile')->name('profile');
    Route::view('transactions', 'transaction')->name('transactions');
});

require __DIR__ . '/auth.php';
