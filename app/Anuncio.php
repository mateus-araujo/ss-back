<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = "anuncios";
    protected $fillable = ['path_to_banner', 'id_prestador'];

}
