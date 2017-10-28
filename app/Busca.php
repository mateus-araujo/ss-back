<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busca extends Model
{
    protected $table = "buscas";
    protected $fillable = ['id_categoria', 'id_servico', 'texto_busca'];
    public $timestamps = true;
}
