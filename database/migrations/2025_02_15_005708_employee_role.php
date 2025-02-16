<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeRole extends Migration
{
    public function up()
    {
        Schema::create('employee_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name_role')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_roles');
    }
}
