<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityLocation extends Model
{
    use HasFactory;

    protected $table = 'university_location_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'latitude',
        'longitude',
        'fk_university_location_id'
    ];

    function university(){
        return $this->belongsTo(LocalUniversity::class, 'id','fk_university_location_id');
    }
}