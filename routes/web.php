<?php

use App\Livewire\AccountType\Create;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('account', [Create::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('account-list');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
