<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeFunction extends Model
{
    protected $fillable = ['employee_id', 'supervisor_id', 'employee_area_id', 'employee_position_id', 'employee_role_id','state'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Employee::class, 'supervisor_id');
    }

    public function area()
    {
        return $this->belongsTo(EmployeeArea::class, 'employee_area_id');
    }

    public function position()
    {
        return $this->belongsTo(EmployeePosition::class, 'employee_position_id');
    }

    public function role()
    {
        return $this->belongsTo(EmployeeRole::class, 'employee_role_id');
    }
}
