<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Livewire\Volt\protect;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
