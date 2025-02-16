<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeePosition extends Migration
{
    public function up()
    {
        Schema::create('employee_positions', function (Blueprint $table) {
            $table->id();
            $table->string('name_position');
            $table->foreignId('employee_area_id')->constrained('employee_areas')->onDelete('cascade');
            $table->foreignId('employee_rol_id')->constrained('employee_roles')->onDelete('cascade');
            $table->unique(['name_position', 'employee_area_id']);
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('employee_positions');
    }
}
