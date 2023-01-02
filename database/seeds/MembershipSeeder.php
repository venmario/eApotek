<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('memberships')->insert([
            'nama' => "SILVER"
        ]);
        DB::table('memberships')->insert([
            'nama' => "GOLD"
        ]);
        DB::table('memberships')->insert([
            'nama' => "PLATINUM"
        ]);
    }
}
