<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class ModelEnseignant extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'model_enseignants';

    protected $fillable = [
        'nom_enseignant',
        'mdp_enseignant',
        'type_enseignant',
    ];

}
