<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@maplaet.com',
            'role' => 'superadmin',
            'password' => '$2y$10$owhhsfE2FrzZoerkclCIp.YTRLwe4W7caIZ6T59bmlEUE1zubp5Oe',
        ]);
    }
}
