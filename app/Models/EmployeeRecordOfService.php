<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRecordOfService extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'effectiveDate',
        'grade',
        'status',
        'salaryscale',
        'incrementalDate',
        'department'
    ];
}
