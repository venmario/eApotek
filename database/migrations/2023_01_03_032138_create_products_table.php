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
            $table->string('deskripsi',255)->nullable();
            $table->string('image',255)->nullable();
            $table->integer('harga');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('suppliers_id')->constrained('users');
            $table->foreignId('categories_id')->constrained('categories');
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
