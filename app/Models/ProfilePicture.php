<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = [
        'path',
    ];

    // The relationship with the user model
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
