<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Muhammad Mukhlish Syarif', 'email' => 'mukhlish@email.com', 'phone' => '1234567890', 'address' => 'Jl Swadaya No. 093'],
            ['name' => 'Rosa Madina', 'email' => 'rosa@email.com', 'phone' => 'abc123', 'address' => 'Kota Melati'],
            ['name' => 'Arina Widiawati', 'email' => 'wiwid@email.com', 'phone' => null, 'address' => null],
            ['name' => 'Muhammad Agung Armansyah', 'email' => 'agung@ymail.com', 'phone' => '123456', 'address' => 'Kota Mawar'],
        ];

        foreach ($users as $userData) {
            $userData['created_at'] = Carbon::now();
            DB::table('users')->insert($userData);
        }
    }
}
