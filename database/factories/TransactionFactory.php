<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
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
            'type' => $this->faker->randomElement(['income', 'expense']),
            'amount' => $this->faker->randomFloat(2, 1, 1000), // Valor aleatório entre 1 e 1000
            'description' => $this->faker->sentence,
            'account_id' => \App\Models\Account::factory(), // Cria uma conta associada
            'date' => $this->faker->date(),
        ];
    }
}
