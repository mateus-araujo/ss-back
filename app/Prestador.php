<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    protected $table = "prestadores";

    protected $fillable = ['usuario_id', 'telefone', 'celular', 'cep', 'bairro', 'cidade', 'estado', 'numero', 'id_serv_1', 'id_serv_2', 'id_serv_3', 'descricao', 'avaliacao', 'foto', 'tipo'];

}
