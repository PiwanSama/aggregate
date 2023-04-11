<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use HasApiTokens, HasFactory, Notifiable;
use App\Models\User;

class UserLogin extends Authenticatable
{

    protected $table = 'user_login_data';

    protected $fillable = [
        'id',
        'external_id',
        'email_address',
        'password_hash',
        'confirmation_token',
        'token',
        'token_generation_time',
        'email_validation_status',
        'password_recovery_token',
        'token_recovery_time',
        'external_provider',
        'external_provider_token',
        'last_login_time',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
