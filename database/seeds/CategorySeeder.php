<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'nama' => "Analgesik Narkotik",
            'deskripsi' => 'analgesik deskripsi'
        ]);
        DB::table('categories')->insert([
            'nama' => "Analgesik Non Narkotik",
            'deskripsi' => 'analgesik deskripsi'
        ]);
        DB::table('categories')->insert([
            'nama' => "Antipirai",
            'deskripsi' => 'deskripsi'
        ]);
        DB::table('categories')->insert([
            'nama' => "Nyeri Neuropatik",
            'deskripsi' => 'deskripsi'
        ]);
        DB::table('categories')->insert([
            'nama' => "Anestetik Lokal",
            'deskripsi' => 'deskripsi'
        ]);
        DB::table('categories')->insert([
            'nama' => "Anestetik Umum dan Oksigen",
            'deskripsi' => 'deskripsi'
        ]);
        DB::table('categories')->insert([
            'nama' => "Obat untuk Prosedur Pre Operatif",
            'deskripsi' => 'deskripsi'
        ]);
        DB::table('categories')->insert([
            'nama' => "Antialergi dan Obat untuk Anafilaksis",
            'deskripsi' => 'deskripsi'
        ]);
        DB::table('categories')->insert([
            'nama' => "Khusus",
            'deskripsi' => 'deskripsi'
        ]);
        DB::table('categories')->insert([
            'nama' => "Umum",
            'deskripsi' => 'deskripsi'
        ]);
        DB::table('categories')->insert([
            'nama' => "Antiepilepsi - Antikonvulsi",
            'deskripsi' => 'deskripsi'
        ]);
    }
}
