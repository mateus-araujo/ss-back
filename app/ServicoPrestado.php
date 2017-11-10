<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicoPrestado extends Model
{
    protected $table = "servicos_prestados";

    protected $fillable = ['id_servico', 'id_prestador', 'data', 'id_solicitante', 'confirmado'];
}
