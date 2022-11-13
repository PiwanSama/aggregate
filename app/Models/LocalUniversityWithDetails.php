<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\UniversityDetails;

class LocalUniversityWithDetails extends Model
{
    
    protected $table = 'local_universities';

    protected $fillable = [
        'id',
        'university',
        'region',
        'award',
        'type'
    ];

    function district(){
        return $this->hasOne(District::class,'id', 'district_id');
    }

    function details(){
        return $this->hasOne(UniversityDetails::class,'university_id','id');
    }

}
