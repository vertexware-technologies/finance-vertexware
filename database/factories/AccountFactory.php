<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'balance' => $this->faker->randomFloat(2, 0, 10000), // Valor aleatório entre 0 e 10000
            'user_id' => \App\Models\User::factory(), // Cria um usuário associado
            'type' => $this->faker->randomElement(['wallet', 'investment', 'bank', 'credit_card']), // Tipos de conta
        ];
    }
}
