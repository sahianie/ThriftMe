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
        'Username',
        'Address',
        'startDate',
        'endDate',
        'totalDays',
        'totalAmount',
        'Contact'

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
