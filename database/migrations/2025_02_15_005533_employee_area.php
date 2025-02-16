<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeArea extends Migration
{

    public function up()
    {
        Schema::create('employee_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name_area')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_areas');
    }
}
