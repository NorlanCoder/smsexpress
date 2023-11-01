<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fraude extends Model
{
    use HasFactory;

    protected $fillable = [
        'somme',
        'code',
        'user_id',
    ];
}
