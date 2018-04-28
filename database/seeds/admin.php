<?php

use Illuminate\Database\Seeder;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'image' => 'image',
            'employee_id' => '0',
            'password' => bcrypt('123456'),
            'National_ID' => mt_rand(10000000000 , 99999999999),
            'image' => '3.jpg',
            'employee_id' => 1
        ]);
    }
}
