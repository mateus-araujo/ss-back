<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Avaliacao;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $avaliacao = new Avaliacao();

        $avaliacao->valor = $request->valor;
        $avaliacao->id_usuario_avaliador = $request->id_usuario_avaliador;
        $avaliacao->id_prestador = $request->id_prestador;

        $avaliacao->save();

        return $avaliacao;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $avaliacao = Avaliacao::find($id);

        return $avaliacao;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $avaliacao = Avaliacao::find($id);

        $avaliacao->valor = $request->valor;
        $avaliacao->id_usuario_avaliador = $request->id_usuario_avaliador;
        $avaliacao->id_prestador = $request->id_prestador;

        $avaliacao->save();

        return $avaliacao;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $avaliacao = Avaliacao::find($id);

        $avaliacao->delete();

        return true;
    }
}
