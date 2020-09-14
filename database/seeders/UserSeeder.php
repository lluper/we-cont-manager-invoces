<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            'name' => 'we cont',
            'email' => 'wecont@gmail.com',
            'password' => Hash::make('1234567'),
        ]);

        DB::table('users')->insert([
            'name' => 'rh wecont',
            'email' => 'rh.wec2019@gmail.com',
            'password' => Hash::make('1234567'),
        ]);

        DB::table('users')->insert([
            'name' => 'user teste',
            'email' => 'teste@gmail.com',
            'password' => Hash::make('1234567'),
        ]);
    }
}
