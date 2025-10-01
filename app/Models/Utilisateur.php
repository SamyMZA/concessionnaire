<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nom', 'mdp'];

    public function achats(): HasMany
    {
        return $this ->hasMany(Achat::class);
    }
}
