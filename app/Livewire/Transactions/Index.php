<?php

namespace App\Livewire\Transactions;

use App\Models\Transaction;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $transactions = Transaction::query()->with(['accountType', 'category'])->paginate(10);
        return view('livewire.transactions.index', compact('transactions'));
    }
}
