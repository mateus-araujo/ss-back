<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    protected $table = "prestadores";

    protected $fillable = ['usuario_id', 'telefone', 'celular', "logradouro", 'cep', "rg", 'bairro', 'cidade', 'estado', 'numero', "complemento", "data_nasc", "aprovado", 'id_serv_1', 'id_serv_2', 'id_serv_3', 'descricao', 'avaliacao', 'foto', 'tipo'];

}