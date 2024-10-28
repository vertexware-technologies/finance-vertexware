<?php

namespace Database\Factories;

use App\Models\AccountType;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'account_type_id' => AccountType::inRandomOrder()->first()->id,
            'description' => $this->faker->sentence(),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'date' => $this->faker->date(),
        ];
    }
}
