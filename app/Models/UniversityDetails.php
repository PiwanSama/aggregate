<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LocalUniversity;
use App\Models\Location;
use App\Models\District;
use App\Models\CampusService;
use App\Models\CampusProgram;
use App\Models\Scholarships;

class UniversityDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'uni_name',
        'uni_motto',
        'uni_details',
        'uni_badge_url',
        'uni_contact',
        'uni_website',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'added_on',
        'university_id'
    ];

    function university(){
        return $this->belongsTo(LocalUniversity::class, 'id','university_id',);
    }

    function location(){
        return $this->hasOne(Location::class, 'id', 'location_id');
    }

    function district(){
        return $this->hasOne(District::class, 'id', 'location_id');
    }

    function services(){
        return $this->hasMany(CampusService::class, 'id', 'location_id');
    }

    function programs(){
        return $this->hasMany(CampusProgram::class, 'id', 'location_id');
    }

    function scholarships(){
        return $this->hasMany(CampusProgram::class, 'id', 'location_id');
    }
}
