<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Busca;
use App\Usuario;
use App\Prestador;
use App\PessoaFisica;

class BuscaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return Busca::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	$busca = new Busca();

    	$busca->id_categoria = $request->id_categoria;
    	$busca->id_servico = $request->id_servico;
    	$busca->texto_busca = $request->texto_busca;

    	$busca->save();

    	return $busca;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function searchLog($id_categoria, $id_servico, $texto_busca) {
    	$busca  = new Busca();

    	$busca->id_categoria = $id_categoria;
    	$busca->id_servico = $id_servico;
    	$busca->texto_busca = $texto_busca;

    	$busca->save();

    	return true;
    }

    public function search (Request $request) {
    	
    	$texto_busca = $request->valor;

    	$id_categoria = $request->id_categoria;
    	$id_servico = $request->id_servico;


    	$a = \DB::table("servicos")
    	->join("prestadores", function($join) {
    		$join->on("servicos.id", "=", "prestadores.id_serv_1")
    		->orOn("servicos.id", "=", "prestadores.id_serv_2")
    		->orOn("servicos.id", "=", "prestadores.id_serv_3");
    	})
    	->join("usuarios", function($join) {
    		$join->on("usuarios.id", "=", "prestadores.usuario_id");
    	})

    	->join("pessoas_fisicas", function ($join) {
    		$join->on("pessoas_fisicas.prestador_id", "=", "prestadores.id");
    	})

    	->select(
    		"servicos.id","nome","servicos.id_categoria","servicos.created_at","servicos.updated_at",
    		"usuario_id","telefone","celular","cep","bairro","cidade","estado",
    		"numero","id_serv_1","id_serv_2","id_serv_3",
    		"descricao","avaliacao","foto","tipo",
    		"name","username","email","tipo_usuario"
    	);

    	if($id_categoria != 0)
    		$a = $a->where("servicos.id_categoria", "=", $id_categoria);

    	if ($id_servico) 
    		$a->where("servicos.id", "=", $id_servico);
    	
    	if (strcmp("", $texto_busca) !== 0) {
    		$a = $a->where("nome", "like", "%". $texto_busca . "%")
    		->orWhere("name", "like", "%". $texto_busca . "%")
    		->orWhere("email", "like", "%". $texto_busca . "%");                
    	}

    	$b = \DB::table("servicos")
    	->join("prestadores", function($join) {
    		$join->on("servicos.id", "=", "prestadores.id_serv_1")
    		->orOn("servicos.id", "=", "prestadores.id_serv_2")
    		->orOn("servicos.id", "=", "prestadores.id_serv_3");
    	})
    	->join("usuarios", function($join) {
    		$join->on("usuarios.id", "=", "prestadores.usuario_id");
               //->on("usuarios.nome", "like", "%". $request->valor. "%");
    	})

    	->join("pessoas_juridicas", function ($join) {
    		$join->on("pessoas_juridicas.prestador_id", "=", "prestadores.id");
    	})

    	->select(
    		"servicos.id","nome","servicos.id_categoria","servicos.created_at","servicos.updated_at",
    		"usuario_id","telefone","celular","cep","bairro","cidade","estado",
    		"numero","id_serv_1","id_serv_2","id_serv_3",
    		"descricao","avaliacao","foto","tipo",
    		"name","username","email","tipo_usuario"
    	);

    	$x = [];
    	$y = [];

    	if ($id_categoria) 
    		$b = $b->where("servicos.id_categoria", "=", $id_categoria);

    	if ($id_servico) 
    		$b = $b->where("servicos.id", "=", $id_servico);
    	
    	if (strcmp("", $texto_busca) !== 0) {
    		$b = $b->where("nome", "like", "%". $texto_busca . "%")
    		->orWhere("name", "like", "%". $texto_busca . "%")
    		->orWhere("email", "like", "%". $texto_busca . "%");    
    	}
    	
    	$x = $a->get();
    	$y = $b->get();

    	$this->searchLog($id_categoria, $id_servico, $texto_busca);

    	return array_merge(json_decode($x, true), json_decode($y, true));            
    }





    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	return Busca::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$busca = Busca::find($id);

    	$busca->id_categoria = $request->id_categoria;
    	$busca->id_servico = $request->id_servico;
    	$busca->texto_busca = $request->texto_busca;

    	$busca->save();

    	return $busca;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$busca = Busca::find($id);

    	$busca->delete();

    	return true;
    }

}