<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaServico extends Model
{
    protected $table = "categoria_servicos";
    
    protected $fillable = ['nome'];
}
