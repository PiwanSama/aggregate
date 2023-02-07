<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusService extends Model
{
    use HasFactory;

    protected $table = 'university_service_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'icon_url',
        'fk_service_university_id'
    ];

    function university(){
        return $this->belongsTo(LocalUniversity::class, 'id','fk_service_university_id');
    }
}
