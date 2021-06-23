<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artistas extends Model
{
    use HasFactory;

    protected $fillable = [
        'noDocumento',
        'tipoDocumento',
        'nombreArtista',
        'apellidoArtista',
        'nombreArtistico',
        'fechaNacimArtista',
        'emailArtista',
        'idDisqueraFK',
        'estadoArtista',
    ];

    public function disquera()
    {
        return $this->belongsTo(disqueras::class);
    }

    public function album()
    {
        return $this->hasMany(Album::class);
    }
}
