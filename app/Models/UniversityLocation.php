<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'latitude',
        'longitude',
        'university_id',
        'added_on'
    ];
}
