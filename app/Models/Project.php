<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Champs autorisés à l'insertion depuis un formulaire
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
    ];
}
