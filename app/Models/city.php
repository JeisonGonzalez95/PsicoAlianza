<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['c_name', 'state_id'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'city_id');
    }
}