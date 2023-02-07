<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'university_faculty_data';

    protected $fillable = [
        'id',
        'name',
        'details',
        'website_url',
        'fk_university_faculty_id '
    ];
}
