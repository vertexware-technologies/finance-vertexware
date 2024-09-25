<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => User::factory(), // Relacionamento com User
            'account_id' => Account::factory(), // Relacionamento com Account
            'description' => $this->faker->sentence(),
            'amount' => $this->faker->randomFloat(2, 10, 1000), // Valor da transação
            'date' => $this->faker->date(),
            'type' => $this->faker->randomElement(['RE', 'DE']), // Tipos de transação como char(2)
        ];
    }
}
