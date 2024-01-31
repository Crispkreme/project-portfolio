<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'user_id' => 1,
            'title' => 'Sample Slider',
            'sub_title' => 'Sample Slider Sub Title',
            'image' => '',
            'video_url' => '',
            'isActive' => 1,
        ]);
    }
}
