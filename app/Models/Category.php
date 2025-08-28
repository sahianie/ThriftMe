<?php

namespace App\Models;

use App\Models\Rental;
use App\Models\Thrift;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'category_name',
        'category_type',
    ];
    public function rental()
    {
        return  $this->hasMany(Rental::class,'category_id');
    }

    public function thrift()
    {
        return  $this->hasMany(Thrift::class,'category_id');
    }
}
