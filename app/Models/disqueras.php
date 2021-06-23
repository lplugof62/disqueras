<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disqueras extends Model
{
    use HasFactory;

    protected $fillable = [
        'nitDisquera',
        'nombreDisquera',
        'telefonoDisquera',
        'estadoDisquera'
    ];


    public function artista()
    {
        return $this->hasMany(Artistas::class);
    }
    
}
