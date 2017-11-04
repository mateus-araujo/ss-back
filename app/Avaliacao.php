<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = "avaliacoes";
    protected $fillable = ["valor", "id_usuario_avaliador", "id_prestador"];
    public $timestamps = true;
}
