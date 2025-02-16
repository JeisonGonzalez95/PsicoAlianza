<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeArea extends Model
{
    protected $fillable = ['name'];

    public function positions()
    {
        return $this->hasMany(EmployeePosition::class);
    }
}
