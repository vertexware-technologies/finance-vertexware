<?php

namespace App\Livewire\Transactions;

use App\Enum\PaymentMethod;
use App\Models\AccountType;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionIndex extends Component
{
    use WithPagination;
    public $modal = false;
    public $transactionToDelete = null;

    public $transactionId;
    public $description;
    public $amount;
    public $date;
    public $payment_method;
    public $category_id;
    public $account_type_id;

    public $categories = [];
    public $accountTypes = [];
    public $paymentMethods = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->accountTypes = AccountType::all();
        $this->paymentMethods = PaymentMethod::cases();
    }


    public function render()
    {
        $transactions = Transaction::where('user_id', Auth::id())->paginate(10);

        return view('livewire.transactions.transaction-index', compact('transactions'));
    }
}
