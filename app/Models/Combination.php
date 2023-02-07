<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combination extends Model
{
    
    protected $table = 'combinations_data';

    protected $fillable = [
        'id',
        'name',
        'category',
        'principal_one',
        'principal_two',
        'principal_three',
        'subsidiary'
    ];
}
