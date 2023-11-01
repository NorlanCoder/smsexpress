<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envoi extends Model
{
    use HasFactory;

    protected $fillable = [
        'expediteur',
        'destinataire',
        'message',
        'user_id',
        'statut'
    ];
}
