<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'logo_url',
        'contact',
        'website_url',
        'university_id',
        'added_on'
    ];
}
