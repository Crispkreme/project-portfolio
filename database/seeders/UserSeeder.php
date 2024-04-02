<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        User::create([
            'name'           => 'Marvin M. Ramos',
            'email'          => 'admin@admin.com',
            'password'       => Hash::make('admin1234'),
            'username'       => 'marvs',
            'isAdmin'        => 1,
            'profile_image'  => '',
        ]);
    }
}
