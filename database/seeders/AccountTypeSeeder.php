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
            ['id' => 1, 'name' => 'Investimento'],
            ['id' => 2, 'name' => 'Conta Corrente'],
            ['id' => 3, 'name' => 'Minha Carteira'],
        ]);
    }
}
