<?php

namespace App\Livewire\Transactions;

use App\Enum\PaymentMethod;
use App\Models\AccountType;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TransactionCreate extends Component
{
    public bool $modal = false;

    public $category_id;
    public $account_type_id;
    public $description;
    public $amount;
    public $date;
    public $payment_method;

    public $categories = [];
    public $accountTypes = [];
    public $paymentMethods = [];

    protected function rules()
    {
        return [
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
            'account_type_id' => 'required|exists:account_types,id',
            'payment_method' => 'required|in:' . implode(',', array_column(PaymentMethod::cases(), 'value')),
            'date' => 'required|date',
        ];
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->accountTypes = AccountType::all();
        $this->paymentMethods = PaymentMethod::cases();
    }

    public function render()
    {
        return view('livewire.transactions.transaction-create');
    }

    public function store()
    {
        $this->validate();

        Transaction::create([
            'user_id' => Auth::id(),
            'category_id' => $this->category_id,
            'account_type_id' => $this->account_type_id,
            'description' => $this->description,
            'amount' => $this->amount,
            'date' => $this->date,
            'payment_method' => $this->payment_method,
        ]);

        $this->reset(['description', 'amount', 'category_id', 'account_type_id', 'payment_method', 'date']);
        $this->modal = false;

        session()->flash('message', 'Transação adicionada com sucesso!');
    }
}
