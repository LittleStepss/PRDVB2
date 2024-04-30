<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'firstname' => 'Frederic',
            'lastname' => 'Kola',
            'mail' => 'fredokola@gmail.com',
            'password' => 'toutestclair',
            'company' => 'BangBangEnterprise',
        ]);
    }
}


//['firstname', 'lastname', 'mail', 'password', 'company'];

