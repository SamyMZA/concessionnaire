<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['marque', 'modele', 'prix', 'img', 'dispo'];

    public function achats()
    {
        return $this ->hasMany(Achat::class, 'id_utilisateur');
    }
}
