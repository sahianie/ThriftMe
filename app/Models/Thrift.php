<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thrift extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'size',
        'material',
        'condition',
        'type',
        'price',
        'status',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }
    public function favouritedBy()
{
    return $this->morphToMany(User::class, 'favouritable', 'favourites')->withTimestamps();
}

}
