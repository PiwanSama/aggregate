<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $table = 'university_scholarships_data';

    protected $fillable = [
        'id',
        'name',
        'details',
        'logo_url',
        'website_url',
        'contact',
        'fk_scholarship_university_id '
    ];

    function university(){
        return $this->belongsTo(LocalUniversity::class, 'id','fk_scholarship_university_id');
    }

}
