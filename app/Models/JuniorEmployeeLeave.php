<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuniorEmployeeLeave extends Model
{
    use HasFactory;
    protected $fillable = [
        'annualleaveStatus',
        'annualleaveMaxDays',
        'annualleaveCarryForwardStatus',
        'annualleaveCarryForwardMaxDays',
        'sickleaveStatus',
        'sickleaveMaxDays',
        'hospitalisationleaveStatus',
        'hospitalisationleaveMaxDays',
        'maternityleaveStatus',
        'maternityleaveMaxDays',
        'paternityleaveStatus',
        'paternityleaveMaxDays'
];
}