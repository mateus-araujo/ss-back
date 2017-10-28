<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
    protected $table = "pessoas_fisicas";

    protected $fillable = ["cpf", "sexo", "curriculum", "prestador_id"];

    public $timestamps = false;
}
