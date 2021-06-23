<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreAlbum',
        'anioPublicacion',
        'idArtistaFK',
        'idGeneroFK',
        'estadoAlbum',
    ];

    public function artista()
    {
        return $this->belongsTo(Artistas::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
}
