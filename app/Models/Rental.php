<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'category_id',
        'title',
        'size',
        'material',
        'condition',
        'type',
        'rent_per_day',
        'image',
    ];
    public function category()
   {
    return  $this->belongsTo(Category::class);
   }
}
