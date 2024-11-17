<?php

namespace App\View\Components\Transactions;

use App\Models\Transaction;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CategoryChart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user = Auth::user();
        $percentages = Transaction::getCategoryPercentages($user->id);
        return view('components.transactions.category-chart', compact('percentages'));
    }
}
