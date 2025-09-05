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

    public function setLinkAttribute($value)
    {
        $clean = trim($value);
    
        // Si c’est un lien youtu.be
        if (strpos($clean, 'youtu.be/') !== false) {
            $clean = explode('youtu.be/', $clean)[1];
            $clean = explode('?', $clean)[0];
            $this->attributes['link'] = "https://www.youtube.com/embed/" . $clean;
            return;
        }
    
        // Si c’est un lien youtube classique
        if (strpos($clean, 'youtube.com/watch?v=') !== false) {
            parse_str(parse_url($clean, PHP_URL_QUERY), $query);
            if (!empty($query['v'])) {
                $this->attributes['link'] = "https://www.youtube.com/embed/" . $query['v'];
                return;
            }
        }
    
        // Si c’est un short
        if (strpos($clean, 'youtube.com/shorts/') !== false) {
            $clean = explode('shorts/', $clean)[1];
            $clean = explode('?', $clean)[0];
            $this->attributes['link'] = "https://www.youtube.com/embed/" . $clean;
            return;
        }
    
        // Sinon → on garde tel quel
        $this->attributes['link'] = $clean;
    }
    


}
