<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalUniversity extends Model
{
    
    protected $table = 'local_universities_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'university',
        'region',
        'award',
        'type',
        'fk_district_id'
    ];

    function district(){
        return $this->belongsTo(District::class, 'fk_district_id');
    }

    function faculties(){
        return $this->hasMany(Faculty::class, 'fk_university_faculty_id');
    }

    function details(){
        return $this->hasOne(UniversityDetails::class,'university_id');
    }

    function location(){
        return $this->hasOne(UniversityLocation::class,'fk_university_location_id');
    }

    function services(){
        return $this->hasMany(CampusService::class, 'fk_service_university_id');
    }

    function programs(){
        return $this->hasMany(CampusProgram::class, 'fk_university_id');
    }

    function scholarships(){
        return $this->hasMany(Scholarship::class, 'fk_scholarship_university_id');
    }
}
