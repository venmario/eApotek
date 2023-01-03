<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama',255);
            $table->string('form',255);
            $table->string('restriction_formula',255);
            $table->string('deskripsi',255);
            $table->string('image',255);
            $table->integer('harga');
            $table->foreignId('suppliers_id')->constrained('users');
            $table->foreignId('categories_id')->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['suppliers_id']);
        Schema::dropColumn('suppliers_id');
        Schema::dropForeign(['categories_id']);
        Schema::dropColumn('categories_id');
        Schema::dropIfExists('products');
    }
}
