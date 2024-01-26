<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'About Title',
            'short_title' => 'About Short Title',
            'short_description' => 'About Short Description',
            'long_description' => 'About Long Description',
            'about_image' => '',
        ]);
    }
}
