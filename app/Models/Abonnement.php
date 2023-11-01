<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'prix',
        'sms',
        'pack',
        'pack_id',
        'user_id',
        'achat_id',
        'statut',
    ];
}
