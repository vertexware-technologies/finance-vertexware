<?php

namespace App\Livewire\Transactions;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionIndex extends Component
{
    use WithPagination;
    public function render()
    {
        $transactions = Transaction::where('user_id', Auth::id())->paginate(10);
        return view('livewire.transactions.transaction-index', [
            'transactions' => $transactions,
        ]);
    }
}
