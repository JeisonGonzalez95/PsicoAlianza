<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeesFunctions extends Migration
{
    public function up()
    {
        Schema::create('employee_functions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('supervisor_id')->nullable()->constrained('employees')->onDelete('set null');
            $table->foreignId('employee_area_id')->constrained('employee_areas')->onDelete('cascade');
            $table->foreignId('employee_position_id')->constrained('employee_positions')->onDelete('cascade');
            $table->foreignId('employee_role_id')->constrained('employee_roles')->onDelete('cascade');
            $table->integer('state')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_functions');
    }
}
