<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use DateTimeInterface;

class Admin extends Authenticable
{
    use HasFactory, Notifiable;

    protected $dates = [
        'created_at',
        'birthday',
    ];
}
