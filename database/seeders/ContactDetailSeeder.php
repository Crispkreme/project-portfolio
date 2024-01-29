<?php

namespace Database\Seeders;

use App\Models\ContactDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ContactDetail::create([
            'user_id' => 1,
            'address' => 'Mabulo St. Prk. 6 Lanton, Brgy. Apopong General Santos City',
            'phone_number' => '09052885214',
            'email_address' => 'marvinramos.nutnull@gmail.com',
        ]);
    }
}
