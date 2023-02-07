<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LocalUniversity;

class District extends Model
{
    use HasFactory;

    protected $table = 'district_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name'
    ];

    function universities(){
        return $this->hasMany(LocalUniversity::class, 'fk_district_id');
    }
}
