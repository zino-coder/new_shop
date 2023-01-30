<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'brand_id',
        'amount',
        'regular_price',
        'sale_price',
        'is_featured',
        'is_hot',
        'view_count',
        'description',
        'content',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function featureImage()
    {
        return $this->morphOne(Media::class, 'mediable')->where('type', 'featured');
    }

    public function thumbImages()
    {
        return $this->morphMany(Media::class, 'mediable')->where('type', 'thumb');
    }
}
