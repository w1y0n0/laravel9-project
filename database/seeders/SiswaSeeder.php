<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert([
            'nama' => 'Anton',
            'npm' => '1000',
            'alamat' => 'Cilacap',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama' => 'Budi',
            'npm' => '1001',
            'alamat' => 'Purwokerto',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama' => 'Chandra',
            'npm' => '1002',
            'alamat' => 'Kebumen',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
