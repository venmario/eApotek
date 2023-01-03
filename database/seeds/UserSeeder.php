<?php

use Carbon\Carbon;
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
        //
        DB::table('users')->insert([
            'fullname' => "PT Kimia Farma",
            'username' => 'kimiafarma',
            'roles_id' => 2,
            'alamat' => 'Jalan Kimia Farma',
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fullname' => "PT Paragon",
            'username' => 'paragon',
            'roles_id' => 2,
            'alamat' => 'Jalan Paragon',
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fullname' => "PT Antariksa",
            'username' => 'antariksa',
            'roles_id' => 2,
            'alamat' => 'Jalan Antariksa',
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fullname' => "Michael Surya",
            'username' => 'michael',
            'roles_id' => 1,
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fullname' => "Kiky Fadillah",
            'username' => 'kiky',
            'roles_id' => 1,
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fullname' => "Pengelola e-Apotek",
            'username' => 'pengelola',
            'roles_id' => 3,
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
