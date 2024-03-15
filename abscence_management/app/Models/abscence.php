<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Abscences;

class abscence extends Model
{
    use HasFactory;

    protected $table = 'abscences';

    protected $fillable = [
        'idEtudiant',
        'idCours',
        'etat',
        'date_abscence',
        'heure_abscence',
    ];

        // POUR AVOIR UNE RELATION ENTRE CES DEUX TABLE
        public function etudiantt()
        {
            return $this->belongsTo(ModelEtudiant::class, 'idEtudiant');
        }
    
        public function courss()
        {
            return $this->belongsTo(ModelCours::class, 'idCours');
        }

}
