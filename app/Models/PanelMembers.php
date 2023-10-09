<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanelMembers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'password',
        'expirinDate',
        'status',
        'uniqueid'
];



}
