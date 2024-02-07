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
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Laravel App',
            'sub_title' => 'Laravel Title',
            'screenshot' => '',
            'description' => 'Laravel Description',
            'url' => '',
        ]);
    }
}
