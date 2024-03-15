<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelInscriptionCours extends Model
{
    use HasFactory;

    protected $table = 'model_inscription_cours';

    public function etudiant()
    {
        return $this->belongsTo(ModelEtudiant::class, 'idEtudiant');
    }

    public function cours()
    {
        return $this->belongsTo(ModelCours::class, 'idCours');
    }

    protected $fillable = [
        'idEtudiant',
        'idCours',
    ];

}
