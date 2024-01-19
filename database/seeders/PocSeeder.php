<?php

namespace Database\Seeders;

use App\Models\Poc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Poc::factory()
            ->count(50)
            ->create();
    }
}
