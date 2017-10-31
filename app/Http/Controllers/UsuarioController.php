<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\PessoaFisica;
use App\PessoaJuridica;
use App\Prestador;
use App\Usuario;
use Auth;
use Hash;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{

    public function doLogin(Request $request)
    {
        if (Auth::attempt(
            ['email' => $request->email,
                'password' => $request->password])) {
            return Auth::user();
        } else
            throw new \Exception("Não foi possível realizar o login. Tente novamente");
    }

    public function doLogout()
    {
        Auth::logout();

        return Auth::user(); // tem que ser nulo
    }

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
        $alreadyUser = Usuario::where('email', '=', $request->email)->first();
        if ($alreadyUser)
            throw new \Exception("Este email já está sendo usado");

        $usuario = new Usuario();

        $usuario->name = $request->name;
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->tipo_usuario = $request->tipo_usuario;

        $usuario->save();

        Auth::login($usuario);


        // Se o tipo do usuário for prestador
        if ($usuario->tipo_usuario == "2") {

            $usuarioId = \DB::table("usuarios")->where("email", '=', $usuario->email)->select("id")->get();

            $prestador = new Prestador();

            $prestador->usuario_id = $usuarioId[0]->id;
            $prestador->telefone = $request->telefone;
            $prestador->celular = $request->celular;
            $prestador->cep = $request->cep;
            $prestador->bairro = $request->bairro;
            $prestador->cidade = $request->cidade;
            $prestador->estado = $request->estado;
            $prestador->numero = $request->numero;

            $prestador->id_serv_1 = $request->id_serv_1;
            $prestador->id_serv_2 = $request->id_serv_2;
            $prestador->id_serv_3 = $request->id_serv_3;

            $prestador->descricao = $request->descricao;
            $prestador->avaliacao = $request->avaliacao;
            $prestador->foto = $request->foto;
            $prestador->tipo = $request->tipo_prestador;

            $prestador->save();

            $prestadorId = \DB::table("prestadores")->where("usuario_id", '=', $prestador->usuario_id)->get();

            if ($prestador->tipo == "1") { // pessoa juridica

                $pessoaJur = new PessoaJuridica();
                $pessoaJur->cnpj = $request->cnpj;
                $pessoaJur->nome_fantasia = $request->nome_fantasia;
                $pessoaJur->razao_social = $request->razao_social;
                $pessoaJur->prestador_id = $prestadorId[0]->id;

                $pessoaJur->save();

            } else { // pessoa física
                $pessoaFisica = new PessoaFisica();
                $pessoaFisica->cpf = $request->cpf;
                $pessoaFisica->sexo = $request->sexo;
                $pessoaFisica->curriculum = $request->curriculum;
                $pessoaFisica->prestador_id = $prestadorId[0]->id;

                $pessoaFisica->save();
            }

        }

        return Auth::user();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return Usuario::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if ($usuario == null)
            throw new \Exception("Este usuario é inexistente.");

        $usuario->name = $request->name;
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->tipo_usuario = $request->tipo_usuario;

        $usuario->save();

        // Se o tipo do usuário for prestador 
        if ($usuario->tipo_usuario == "2") {

            $usuarioId = \DB::table("usuarios")->where("email", '=', $usuario->email)->select("id")->get();

            $prestador = Prestador::where('usuario_id', '=', $usuarioId[0]->id);

            $prestador->telefone = $request->telefone;
            $prestador->celular = $request->celular;
            $prestador->cep = $request->cep;
            $prestador->bairro = $request->bairro;
            $prestador->cidade = $request->cidade;
            $prestador->estado = $request->estado;
            $prestador->numero = $request->numero;

            $prestador->id_serv_1 = $request->id_serv_1;
            $prestador->id_serv_2 = $request->id_serv_2;
            $prestador->id_serv_3 = $request->id_serv_3;

            $prestador->descricao = $request->descricao;
            $prestador->avaliacao = $request->avaliacao;
            $prestador->foto = $request->foto;
            $prestador->tipo = $request->tipo_prestador;

            $prestador->save();

            $prestadorId = \DB::table("prestadores")->where("usuario_id", '=', $prestador->usuario_id)->get();

            if ($prestador->tipo == "1") { // pessoa juridica

                $pessoaJur = PessoaJuridica::where("prestador_id", "=", $prestadorId[0]->id);
                $pessoaJur->cnpj = $request->cnpj;
                $pessoaJur->nome_fantasia = $request->nome_fantasia;
                $pessoaJur->razao_social = $request->razao_social;


                $pessoaJur->save();

            } else { // pessoa física
                $pessoaFisica = PessoaFisica::where("prestador_id", "=", $prestadorId[0]->id);
                $pessoaFisica->cpf = $request->cpf;
                $pessoaFisica->sexo = $request->sexo;
                $pessoaFisica->curriculum = $request->curriculum;

                $pessoaFisica->save();
            }

        }

        return Auth::user();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();

        return response('O usuário foi deletado com sucesso!', 201);
    }
}
