<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Usuários
Route::get('user/{id}', 'UsuarioController@show');
Route::delete('user/{id}', 'UsuarioController@destroy');
Route::post('user/{id}', 'UsuarioController@update');
Route::post('user', 'UsuarioController@create');

// Prestadores
Route::get('prestadores', 'UsuarioController@getPrestadores');
Route::get('prestador/{id}', 'UsuarioController@getPrestador');

// Auth
Route::post('login', 'UsuarioController@doLogin');
Route::get('checkLogin', 'UsuarioController@checkLogin');
Route::get('logout', 'UsuarioController@doLogout');

// Categorias
Route::resource('categorias', 'CategoriaServicoController', ['only' => [
    'index', 'store'
]]);
Route::get('categoria/{id}', 'CategoriaServicoController@show');
Route::delete('categoria/{id}', 'CategoriaServicoController@destroy');
Route::post('categoria/{id}', 'CategoriaServicoController@update');

// Servicos
Route::resource('servicos', 'ServicoController', ['only' => [
    'index', 'store'
]]);
Route::get('categoria/{id}/servicos', 'ServicoController@getServicos');
Route::get('servico/{id}', 'ServicoController@show');
Route::delete('servico/{id}', 'ServicoController@destroy');
Route::post('servico/{id}', 'ServicoController@update');

// Servicos prestados
Route::get('servicoprestado/{id}', 'ServicoPrestadoController@show');
Route::delete('servicoprestado/{id}', 'ServicoPrestadoController@destroy');
Route::post('servicoprestado/{id}', 'ServicoPrestadoController@update');
Route::post('servicoprestado', 'ServicoPrestadoController@create');

// Planos
Route::post('plano', 'PlanoController@store');
Route::get('planos', 'PlanoController@index');
Route::get('plano/{id}', 'PlanoController@show');
Route::delete('plano/{id}', 'PlanoController@destroy');
Route::post('plano/{id}', 'PlanoController@update');

// Pagamentos
Route::post('pagamento', 'PagamentoController@create');
Route::post('pagamento/{id}', 'PagamentoController@update');
Route::delete('pagamento/{id}', 'PagamentoController@destroy');
Route::get('pagamento/{id}', 'PagamentoController@show');

// Anúncios
Route::post('anuncio', 'AnuncioController@create');
Route::post('anuncio/{id}', 'AnuncioController@update');
Route::delete('anuncio/{id}', 'AnuncioController@destroy');
Route::get('anuncio/{id}', 'AnuncioController@show');

// Comentários
Route::post('comentario', 'ComentarioController@create');
Route::post('comentario/{id}', 'ComentarioController@update');
Route::delete('comentario/{id}', 'ComentarioController@destroy');
Route::get('comentario/{id}', 'ComentarioController@show');

// Buscas
Route::post('busca', 'BuscaController@create');
Route::post('busca/{id}', 'BuscaController@update');
Route::delete('busca/{id}', 'BuscaController@destroy');
Route::get('busca/{id}', 'BuscaController@show');
Route::post('busca', "BuscaController@search");

// Avaliação 
Route::post('avaliacao', "AvaliacaoController@create");
Route::post('avaliacao/{id}', "AvaliacaoController@update");
Route::delete('avaliacao/{id}', "AvaliacaoController@destroy");
Route::get('avaliacao/{id}', "AvaliacaoController@show");