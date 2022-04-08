<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'alevel_subjects';
    protected $fillable = [
        'name',
        'field',
        'category',
        'code',
        'paper_count'
    ];
}
