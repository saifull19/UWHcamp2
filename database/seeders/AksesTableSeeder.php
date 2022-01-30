<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AksesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akses')->insert([
            [
                'user_role_id' => 4,
                'menu_id' => 1,
                'akses' => 1,
                'tambah' => 0,
                'edit' => 0,
                'hapus' => 0
            ],
            [
                'user_role_id' => 4,
                'menu_id' => 2,
                'akses' => 0,
                'tambah' => 0,
                'edit' => 0,
                'hapus' => 0
            ],
            [
                'user_role_id' => 4,
                'menu_id' => 3,
                'akses' => 0,
                'tambah' => 0,
                'edit' => 0,
                'hapus' => 0
            ],
            [
                'user_role_id' => 4,
                'menu_id' => 4,
                'akses' => 1,
                'tambah' => 1,
                'edit' => 1,
                'hapus' => 1
            ],
            [
                'user_role_id' => 4,
                'menu_id' => 5,
                'akses' => 1,
                'tambah' => 1,
                'edit' => 1,
                'hapus' => 1
            ],
            [
                'user_role_id' => 4,
                'menu_id' => 6,
                'akses' => 0,
                'tambah' => 0,
                'edit' => 0,
                'hapus' => 0
            ]
        ]);
    }
}
