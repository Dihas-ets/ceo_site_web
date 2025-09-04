<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author',
        'category_id',
        'type',
        'format',
        'file_path',
        'link',
        'featured',
        'image',
        'duration',
        'status', // <-- Ajouté pour permettre l'enregistrement
    ];
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
