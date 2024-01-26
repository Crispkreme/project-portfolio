<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::create([
            'portfolio_type_id' => 1,
            'portfolio_name' => 'Laravel App',
            'portfolio_title' => 'Laravel Title',
            'portfolio_image' => '',
            'portfolio_description' => 'Laravel Description',
            'portfolio_url' => '',
        ]);

    }
}
