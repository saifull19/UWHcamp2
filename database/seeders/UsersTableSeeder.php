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
                'email' => 'ssaifullanam99@gmail.com',
                'user_role_id' => 3,
                'password' => Hash::make('password'),
                'email_verified_at' => date('Y-n-d H:i:s', time()),
                'remember_token' => NULL,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
                'name' => 'Muhammad Andi',
                'email' => 'andi@gmail.com',
                'user_role_id' => 4,
                'password' => Hash::make('password'),
                'email_verified_at' => date('Y-n-d H:i:s', time()),
                'remember_token' => NULL,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ],
            
        ];

        User::insert($users);
    }
}
