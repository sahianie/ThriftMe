<?php

namespace App\Models;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'rental_id',
        'username',
        'address',
        'start_date',
        'end_date',
        'total_days',
        'total_amount',
        'contact'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

}
