<?php

namespace Database\Seeders;

use App\Models\PortfolioType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PortfolioType::create([
            'portfolio_type' => 'Programming',
        ]);
        PortfolioType::create([
            'portfolio_type' => 'IOT',
        ]);
    }
}
