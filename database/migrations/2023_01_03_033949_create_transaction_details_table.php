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
            $table->foreignId('products_id')->constrained('products');
            $table->foreignId('transactions_id')->constrained('transactions');
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
