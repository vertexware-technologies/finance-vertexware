<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'account_type_id',
        'description',
        'amount',
        'date'
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
        return Transaction::where('user_id', $user_id)->sum('amount');
    }
}
