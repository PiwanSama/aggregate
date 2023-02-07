<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusProgram extends Model
{
    use HasFactory;

    protected $table = 'university_cocurricular_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'description',
        'logo_url',
        'fk_university_id'
    ];

    function university(){
        return $this->belongsTo(LocalUniversity::class, 'id','fk_university_id');
    }
}
