<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $users = [
            [
                'name' => 'Saiful Anam',
                'email' => 'saifullanam19@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => date('Y-n-d H:i:s', time()),
                'remember_token' => NULL,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
                'is_admin' => true
            ]
            
        ];

        User::insert($users);
    }
}
