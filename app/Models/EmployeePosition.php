<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePosition extends Model
{
    protected $fillable = ['title', 'employee_area_id'];

    public function area()
    {
        return $this->belongsTo(EmployeeArea::class, 'employee_area_id');
    }
}
