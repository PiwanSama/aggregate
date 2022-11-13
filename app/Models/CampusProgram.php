<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'icon_url',
        'university_id',
        'added_on'
    ];
}
