<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_utilisateur',
        'id_voiture',
    ];

    public function voiture(){
        return $this->belongsTo(Voiture::class, 'id_voiture');
    }

    public function utilisateur(){
        return $this->belongsTo( Utilisateur::class,'id_utilisateur');
    }
}
