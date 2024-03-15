<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCours extends Model
{
    use HasFactory;

    protected $table = 'model_cours';

    public function inscriptions()
    {
        return $this->hasMany(modelInscription::class, 'idCours');
    }
    
    protected $fillable = [
        'nom_cours',
        'sigle_cours',
        'nbr_credit',
    ];

    // RELATION INVERSE
    public function abscences()
    {
        return $this->hasMany(Abscences::class, 'idCours');
    }
}
