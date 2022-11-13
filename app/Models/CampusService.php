<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusService extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'icon_url',
        'university_id',
        'added_on'
    ];
}
