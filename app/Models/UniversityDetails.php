<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LocalUniversity;

class UniversityDetails extends Model
{
    use HasFactory;

    protected $table = 'university_details_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'uni_name',
        'uni_motto',
        'uni_details',
        'uni_badge_url',
        'uni_header_url',
        'uni_contact',
        'uni_website',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'uni_address',
        'university_id'
    ];

    function university(){
        return $this->belongsTo(LocalUniversity::class, 'id','university_id',);
    }
}
