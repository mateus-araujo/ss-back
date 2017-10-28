<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\ServicoPrestado;

class ServicoPrestadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $servPrest = new ServicoPrestado();

        $servPrest->id_servico = $request->id_servico;
        $servPrest->id_prestador = $request->id_prestador;
        $servPrest->solicitante = $request->solicitante;
        $servPrest->confirmado = false;

        $servPrest->save();

        return $servPrest;
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
        return ServicoPrestado::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $servPrest = ServicoPrestado::find($id);

        $servPrest->id_servico = $request->id_servico;
        $servPrest->id_prestador = $request->id_prestador;
        $servPrest->solicitante = $request->solicitante;
        $servPrest->confirmado = false;

        $servPrest->save();

        return $servPrest;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = ServicoPrestado::find($id);
        
        if ($sp)
            $sp->delete();

        return true;
    }
}
