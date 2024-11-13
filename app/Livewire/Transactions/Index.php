<?php

namespace App\Livewire\Transactions;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $user = Auth::user();
        $transactions = Transaction::query()
            ->whereBelongsTo($user)
            ->with(['accountType', 'category'])
            ->orderBy('date', 'desc') // Ordena por data, do mais novo ao mais velho
            ->paginate(7);

        return view('livewire.transactions.index', compact('transactions'));
    }
}
