<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{ 
    
    protected $table = "pessoas_juridicas";

    protected $fillable = ['cnpj', 'nome_fantasia', 'razao_social', 'prestador_id'];

    public $timestamps = false;
}
