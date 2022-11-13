<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\UniversityDetails;

class LocalUniversity extends Model
{
    
    protected $table_name = 'local_universities';

    protected $fillable = [
        'id',
        'university',
        'region',
        'award',
        'type',
        'district_id',
        'location_id',
    ];

    function district(){
        return $this->hasOne(District::class,'id','district_id');
    }

    function details(){
        return $this->hasOne(UniversityDetails::class,'id','district_id');
    }
}
