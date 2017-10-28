<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = "pagamentos";
    protected $fillable = ['valor', 'id_plano', 'id_prestador', 'data_vencimento', 'data_pagamento'];
}
