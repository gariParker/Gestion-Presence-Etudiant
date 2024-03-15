<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class ModelAdmin extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'model_admins';

    protected $fillable = [
        'nom_admin',
        'mot_de_passe_admin',
        'type_admin',
    ];
}

