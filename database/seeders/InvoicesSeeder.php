<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Provider\DateTime;
class InvoicesSeeder extends Seeder
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
            'user_id' => '1',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'aberta',
            'user_id' => '1',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'atrasada',
            'user_id' => '2',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'paga',
            'user_id' => '1',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'aberta',
            'user_id' => '1',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'atrasada',
            'user_id' => '2',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'paga',
            'user_id' => '1',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'aberta',
            'user_id' => '1',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'atrasada',
            'user_id' => '2',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'paga',
            'user_id' => '1',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'aberta',
            'user_id' => '1',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'atrasada',
            'user_id' => '2',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'paga',
            'user_id' => '2',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'aberta',
            'user_id' => '2',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'atrasada',
            'user_id' => '2',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'paga',
            'user_id' => '2',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'aberta',
            'user_id' => '2',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);

        DB::table('invoices')->insert([
            'status' => 'atrasada',
            'user_id' => '2',
            'expiration' => Carbon::parse(DateTime::date($format = 'Y-m-d', $max = 'now')),
            'url' => '/teste',
        ]);
    }
}
