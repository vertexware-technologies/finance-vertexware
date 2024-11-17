<?php

namespace App\Livewire\Transactions;

use App\Enum\PaymentMethod;
use App\Models\AccountType;
use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class ButtonTransactionUpdate extends Component
{
    public $transaction;

    public $modal = false;
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

    public function mount($transaction)
    {
        $this->transaction = $transaction;
        $this->categories = Category::all();
        $this->accountTypes = AccountType::all();
        $this->paymentMethods = PaymentMethod::cases();
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);

        $this->transactionId = $transaction->id;
        $this->description = $transaction->description;
        $this->amount = $transaction->amount;
        $this->date = Carbon::parse($transaction->date)->format('Y-m-d');
        $this->payment_method = $transaction->payment_method;
        $this->category_id = $transaction->category_id;
        $this->account_type_id = $transaction->account_type_id;

        $this->modal = true;
    }

    public function update()
    {
        $this->payment_method = is_object($this->payment_method) ? $this->payment_method->value : $this->payment_method;
        $this->validate();
        $transaction = Transaction::findOrFail($this->transactionId);

        $transaction->update([
            'description' => $this->description,
            'amount' => $this->amount,
            'date' => $this->date,
            'payment_method' => $this->payment_method,
            'category_id' => $this->category_id,
            'account_type_id' => $this->account_type_id,
        ]);
        session()->flash('message', 'Transação atualizada com sucesso!');
        $this->reset();
        $this->modal = false;

        return redirect()->route('transactions');
    }
    public function render()
    {
        return view('livewire.transactions.button-transaction-update');
    }
}
