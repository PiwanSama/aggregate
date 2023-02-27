<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyProgram extends Model
{
    
    protected $table = 'faculty_programs_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'code',
        'details',
        'duration',
        'study_time',
        'is_external',
        'is_parallel',
        'is_government_sponsored',
        'is_private_sponsored',
        'is_district_quota_sponsored',
        'is_sports_sponsored',
        'is_disability_sponsored',
        'has_subject_requirements',
        'essential_subjects',
        'relevant_subjects',
        'desirable_subjects',
        'fk_parent_faculty_id'
    ];

    function faculties(){
        return $this->belongsTo(Faculty::class, 'id','fk_parent_faculty_id');
    }

}
