<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function featureImage()
    {
        return $this->morphMany(Media::class, 'mediable')->where('type', 'featured');
    }

    public function thumbImage()
    {
        return $this->morphOne(Media::class, 'mediable')->where('type', 'thumb');
    }
}
