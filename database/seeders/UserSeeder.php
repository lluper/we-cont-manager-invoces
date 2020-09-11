<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'name' => 'leonardo luper',
            'email' => 'leonardoluper5@gmail.com',
            'password' => Hash::make('992533858luper'),
        ]);

        DB::table('users')->insert([
            'name' => 'gabriel luper',
            'email' => 'gabrielluper@gmail.com',
            'password' => Hash::make('992533858luper'),
        ]);
    }
}
