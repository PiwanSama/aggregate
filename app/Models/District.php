<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LocalUniversity;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'added_on'
    ];

    function universities(){
        return $this->belongsToMany(LocalUniversity::class);
    }
}
