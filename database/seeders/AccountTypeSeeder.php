<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account_types')->insert([
            ['id' => 1, 'name' => 'Minha Carteira'],
            ['id' => 2, 'name' => 'Conta Corrente'],
            ['id' => 3, 'name' => 'Conta de investimento'],
            ['id' => 4, 'name' => 'Conta empresarial'],
            ['id' => 5, 'name' => 'Cartão de crédito'],
            ['id' => 6, 'name' => 'Débito automático'],
            ['id' => 7, 'name' => 'Crédito automático'],
        ]);
    }
}
