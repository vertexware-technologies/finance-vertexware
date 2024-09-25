<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeFactory extends Factory
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
            'account_id' => Account::factory(), // Cria uma conta associada
            'description' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, 1, 1000), // Valor aleatório entre 1 e 1000
            'date' => $this->faker->date(),
        ];
    }
}
