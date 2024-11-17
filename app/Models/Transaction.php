<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enum\PaymentMethod;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'account_type_id',
        'description',
        'amount',
        'date',
        'payment_method',
    ];

    protected $casts = [
        'payment_method' => PaymentMethod::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }
    public static function getUserBalance($user_id)
    {
        $soma = Transaction::where('user_id', $user_id)
            ->where('category_id', 1)
            ->sum('amount');

        $subtracao = Transaction::where('user_id', $user_id)
            ->whereIn('category_id', [2, 3])
            ->sum('amount');
        $saldo = $soma - $subtracao;
        return $saldo;
    }
    public static function getCategoryPercentages($user_id)
    {
        $income = Transaction::where('user_id', $user_id)
            ->where('category_id', 1)
            ->sum('amount');

        $expense = Transaction::where('user_id', $user_id)
            ->where('category_id', 2)
            ->sum('amount');

        $investment = Transaction::where('user_id', $user_id)
            ->where('category_id', 3)
            ->sum('amount');

        $total = $income + $expense + $investment;

        if ($total == 0) {
            return [
                'income' => 0,
                'expense' => 0,
                'investment' => 0,
            ];
        }

        return [
            'income' => round(($income / $total) * 100, 2),
            'expense' => round(($expense / $total) * 100, 2),
            'investment' => round(($investment / $total) * 100, 2),
        ];
    }
}
