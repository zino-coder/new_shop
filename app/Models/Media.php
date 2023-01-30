<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mediable_id',
        'mediable_type',
        'type',
    ];

    public function mediable()
    {
        return $this->morphTo();
    }
}
