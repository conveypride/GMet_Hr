<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    use HasFactory;
     protected $fillable = [
        'user_id',
        'leavefrom',
        'leaveto',
        'leavetype',
        'signedbySupervisor',
        'supervisorname',
        'leavereason',
        'status'

    ];
}
