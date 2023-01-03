<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->integer('products_id')->unsigned();
            $table->integer('transactions_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('transactions_id')->references('id')->on('transactions');
            $table->integer('quantity');
            $table->double('price');
            $table->double('subtotal');
            $table->integer('poin');
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
        Schema::dropForeign(['products_id']);
        Schema::dropColumn('products_id');
        Schema::dropForeign(['transactions_id']);
        Schema::dropColumn('transactions_id');
        Schema::dropIfExists('transaction_details');
    }
}
