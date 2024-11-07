<?php

namespace App\Livewire\Transactions;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $user = Auth::user();
        $balance = Transaction::getUserBalance($user->id);

        $income = Transaction::where('user_id', $user->id)
            ->where('category_id', 1)
            ->sum('amount');

        $expense = Transaction::where('user_id', $user->id)
            ->where('category_id', 2)
            ->sum('amount');

        $investment = Transaction::where('user_id', $user->id)
            ->where('category_id', 3)
            ->sum('amount');

        return view('livewire.transactions.dashboard', compact(['balance', 'income', 'expense', 'investment']));
    }
}