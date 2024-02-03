<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract
{
    use HasApiTokens, HasFactory;
    use Authenticatable;
    // The attributes that are mass assignable
    protected $fillable = [
        'username',
        'email',
        'password',
        'profile_picture_id',
        'interests',
    ];

    // The attributes that should be hidden for arrays
    protected $hidden = [
        'password',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile_picture()
    {
        return $this->belongsTo(ProfilePicture::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
