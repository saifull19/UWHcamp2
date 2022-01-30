<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebinarStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('webinar_status')->insert([
            [
                'name' => 'Waiting'
            ],
            [
                'name' => 'Progress'
            ],
            [
                'name' => 'Progress'
            ],
            
        ]);
    }
}
