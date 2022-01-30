<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            [
                'nama_menu' => 'User',
                'level_menu' => 'main_menu',
                'master_menu' => 0,
                'url' => '',
                'icon' => '',
                'activ' => 'Y',
                'no_urut' => 7
            ],
            [
                'nama_menu' => 'Mentor',
                'level_menu' => 'sub_menu',
                'master_menu' => 7,
                'url' => 'member.mentor.index',
                'icon' => '',
                'activ' => 'Y',
                'no_urut' => 8
            ],
            [
                'nama_menu' => 'Tutor',
                'level_menu' => 'sub_menu',
                'master_menu' => 7,
                'url' => 'member.tutor.index',
                'icon' => '',
                'activ' => 'Y',
                'no_urut' => 9
            ],
            // [
            //     'nama_menu' => 'MyRequest',
            //     'level_menu' => 'main_menu',
            //     'master_menu' => 0,
            //     'url' => 'member.request.index',
            //     'icon' => '',
            //     'activ' => 'Y',
            //     'no_urut' => 4
            // ],
            // [
            //     'nama_menu' => 'Profile',
            //     'level_menu' => 'main_menu',
            //     'master_menu' => 0,
            //     'url' => 'member.profile.index',
            //     'icon' => '',
            //     'activ' => 'Y',
            //     'no_urut' => 5
            // ],
        ]);
    }
}
