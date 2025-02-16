<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 255);
            $table->integer('dni')->unique();
            $table->string('email');
            $table->integer('phone');
            $table->foreignId('departament_id')->constrained('states');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('rol_id')->nullable()->constrained('employee_roles');
            $table->integer('state')->default(1);
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
        Schema::dropIfExists('employees');
    }
}
