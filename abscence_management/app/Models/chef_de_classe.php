<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class chef_de_classe extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'chef_de_classes';

    protected $fillable = [
        'nom_etudiant',
        'mdp_etudiant',
        'type_etudiant',
    ];

}
