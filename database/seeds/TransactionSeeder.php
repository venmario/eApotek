<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'user_id' => 4,
            'total_poin' => 403,
            'total_harga'=>4035000,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'user_id' => 4,
            'total_poin' => 15,
            'total_harga'=>150000,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'user_id' => 4,
            'total_poin' => 76,
            'total_harga'=>760000,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'user_id' => 5,
            'total_poin' => 1022,
            'total_harga'=>10220000,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'user_id' => 5,
            'total_poin' => 19,
            'total_harga'=>190000,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
