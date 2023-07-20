<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data table users
        DB::table('users')->insert([
            'name' => 'Rafif',
            'email' => 'email@gmail.com',
            'password' => Hash::make('12345')
        ]);
    }
}
