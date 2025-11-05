<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'mdp',
    ];

    public function achats(){
        // return $this->hasMany(Achat::class, 'id_utilisateur');
    }
}
