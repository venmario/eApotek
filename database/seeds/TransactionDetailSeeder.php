<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'products_id' => 1,
            'transactions_id' => 15,
            'quantity'=>6,
            'price'=>5000,
            'subtotal' => 30000,
            'poin' => 3,
        ]);
        DB::table('products')->insert([
            'products_id' => 1,
            'transactions_id' => 17,
            'quantity'=>4,
            'price'=>5000,
            'subtotal' => 20000,
            'poin' => 2,
        ]);
        DB::table('products')->insert([
            'products_id' => 2,
            'transactions_id' => 15,
            'quantity'=>3,
            'price'=>40000,
            'subtotal' => 120000,
            'poin' => 12,
        ]);
        DB::table('products')->insert([
            'products_id' => 6,
            'transactions_id' => 14,
            'quantity'=>7,
            'price'=>5000,
            'subtotal' => 35000,
            'poin' => 3,
        ]);
        DB::table('products')->insert([
            'products_id' => 4,
            'transactions_id' => 14,
            'quantity'=>4,
            'price'=>1000000,
            'subtotal' => 4000000,
            'poin' => 400,
        ]);
        DB::table('products')->insert([
            'products_id' => 2,
            'transactions_id' => 16,
            'quantity'=>7,
            'price'=>40000,
            'subtotal' => 280000,
            'poin' => 28,
        ]);
        DB::table('products')->insert([
            'products_id' => 5,
            'transactions_id' => 16,
            'quantity'=>7,
            'price'=>40000,
            'subtotal' => 280000,
            'poin' => 28,
        ]);
    }
}
