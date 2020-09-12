<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class InvocesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->insert([
            'status' => 'paga',
            'expiration' => Carbon::parse('2000-01-01'),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'aberta',
            'expiration' => Carbon::parse('2000-01-01'),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'atrasada',
            'expiration' => Carbon::parse('2000-01-01'),
            'url' => '/teste',
        ]);
    }
}