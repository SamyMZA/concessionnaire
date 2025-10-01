<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_utilisateur', 'id_voiture'];

    public function utilisateur(): mixed
    {
        return $this ->belongTo(Utilisateur::class);
    }

    public function voiture(): mixed
    {
        return $this ->belongTo(Voiture::class);
    }
}
