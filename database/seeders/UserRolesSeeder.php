<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            [
                'role_user' => 'Administrator'
            ],
            [
                'role_user' => 'Mentor'
            ],
            [
                'role_user' => 'Tutor'
            ],
            [
                'role_user' => 'Member'
            ],
        ]);
    }
}
