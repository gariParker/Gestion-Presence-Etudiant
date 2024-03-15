<?php

namespace App\Models;
use App\Models\abscence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelEtudiant extends Model
{
    use HasFactory;

    protected $table = 'model_etudiants';

    public function inscriptions()
    {
        return $this->hasMany(ModelInscription::class, 'idEtudiant');
    }

    protected $fillable = [
        'nom',
        'prenom',
        'classe',
    ];

    // RELATION INVERSE
    public function abscences()
    {
        return $this->hasMany(abscence::class, 'idEtudiant');
    }

}
