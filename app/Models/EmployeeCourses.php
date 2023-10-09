<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCourses extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'courses',
        'courseyear',

    ];
}
