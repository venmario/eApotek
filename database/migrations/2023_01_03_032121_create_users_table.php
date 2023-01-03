<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username',55)->unique();
            $table->string('password',255);
            $table->string('fullname',255);
            $table->integer('poin')->default('0');
            $table->foreignId('roles_id')->constrained('roles');
            $table->foreignId('memberships_id')->default('1')->constrained('memberships');
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
        Schema::dropForeign(['roles_id']);
        Schema::dropColumn('roles_id');
        Schema::dropForeign(['memberships_id']);
        Schema::dropColumn('memberships_id');
        Schema::dropIfExists('users');
    }
}
