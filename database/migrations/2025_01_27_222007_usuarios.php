<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_app', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('lastname', 255);
            $table->integer('dni')->unique();
            $table->string('email');
            $table->string('username', 150)->unique();
            $table->string('password');
            $table->integer('state')->default(1);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users_app');
    }
}
