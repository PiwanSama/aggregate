<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalUniversity extends Model
{
    
    protected $table_name = 'local_universities';

    protected $fillable = [
        'name',
        'region',
        'district',
        'award',
        'type'
    ];
}
