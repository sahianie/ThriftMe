<?php

namespace App\Models;

use App\Models\Thrift;
use App\Models\Rental;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function rentalFavourites()
    {
        return $this->morphedByMany(Rental::class, 'favouritable', 'favourites')->withTimestamps();
    }

    public function thriftFavourites()
    {
        return $this->morphedByMany(Thrift::class, 'favouritable', 'favourites')->withTimestamps();
    }

    public function notifications()
    {
        return $this->morphMany(\Illuminate\Notifications\DatabaseNotification::class, 'notifiable')->latest();
    }
}
