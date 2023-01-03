<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 3; $i++) { 
            DB::table('products')->insert([
                'nama' => "fentanil",
                'form' => 'patch 25 mcg/jam',
                'restriction_formula'=>'30 tab/bulan',
                'deskripsi'=>'-',
                'harga' => 40000,
                'image' => '1672770022_download.jfif',
                'suppliers_id' => 1,
                'categories_id' => 1,
            ]);
        }

        for ($i=0; $i < 3; $i++) { 
            DB::table('products')->insert([
                'nama' => "ketoprofen",
                'form' => 'patch 25 mcg/jam',
                'restriction_formula'=>'30 tab/bulan',
                'deskripsi'=>'-',
                'harga' => 100000,
                'image' => '1672770022_download.jfif',
                'suppliers_id' => 2,
                'categories_id' => $i+2,
            ]);
        }
    }
}
