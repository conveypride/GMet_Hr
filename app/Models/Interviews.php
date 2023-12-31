<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interviews extends Model
{
    use HasFactory;
    protected $fillable = [
        "nomineeid",
        "nomineename",
        "dateofinterview",
        "inteviewtype",
        "panelid",
        "emailcontent",
        'interviewletter',
        'status',
    ];
}
