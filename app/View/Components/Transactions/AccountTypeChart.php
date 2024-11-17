<?php

namespace App\View\Components\Transactions;

use App\Models\Transaction;
use App\Models\AccountType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AccountTypeChart extends Component
{
    public $accountTypePercentages;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $user = Auth::user();
        $this->accountTypePercentages = Transaction::getAccountTypePercentages($user->id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $accountTypes = AccountType::pluck('name', 'id')->toArray();
        $percentages = $this->accountTypePercentages;
        return view('components.transactions.account-type-chart', compact('accountTypes', 'percentages'));
    }
}
