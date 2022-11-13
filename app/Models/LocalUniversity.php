<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class LocalUniversity extends Model
{
    
    protected $table = 'local_universities';

    protected $fillable = [
        'id',
        'university',
        'region',
        'award',
        'type',
        'district_id'
    ];

    function district(){
        return $this->hasOne(District::class,'id', 'district_id');
    }
}
