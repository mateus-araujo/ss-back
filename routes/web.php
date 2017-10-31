<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


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

// Usuários
Route::post('/createuser', "UsuarioController@create");
Route::post('/updateuser/{id}', "UsuarioController@update");
Route::post('/login', "UsuarioController@doLogin");
Route::get('/logout', "UsuarioController@doLogout");
Route::get('/deleteuser/{id}', "UsuarioController@destroy");
Route::get('/user/{id}', "UsuarioController@show");// retrieve

// Categorias
Route::post('/createcategoriaservico', "CategoriaServicoController@create");
Route::post('/updatecategoriaservico/{id}', "CategoriaServicoController@update");
Route::get('/deletecategoriaservico/{id}', "CategoriaServicoController@destroy");
Route::get('/categoriaservico/{id}', "CategoriaServicoController@show");

// Servicos
Route::post('/createservico', "ServicoController@create");
Route::post('/updateservico/{id}', "ServicoController@update");
Route::get('/deleteservico/{id}', "ServicoController@destroy");
Route::get('/servico/{id}', "ServicoController@show");

// Servicos prestados
Route::post('/createservicoprestado', "ServicoPrestadoController@create");
Route::post('/updateservicoprestado/{id}', "ServicoPrestadoController@update");
Route::get('/deleteservicoprestado/{id}', "ServicoPrestadoController@destroy");
Route::get('/servicoprestado/{id}', "ServicoPrestadoController@show");

// Planos
Route::post('/createplano', "PlanoController@create");
Route::post('/updateplano/{id}', "PlanoController@update");
Route::get('/deleteplano/{id}', "PlanoController@destroy");
Route::get('/plano/{id}', "PlanoController@show");

// Pagamentos
Route::post('/createpagamento', "PagamentoController@create");
Route::post('/updatepagamento/{id}', "PagamentoController@update");
Route::get('/deletepagamento/{id}', "PagamentoController@destroy");
Route::get('/pagamento/{id}', "PagamentoController@show");

// Anúncios
Route::post('/createanuncio', "AnuncioController@create");
Route::post('/updateanuncio/{id}', "AnuncioController@update");
Route::get('/deleteanuncio/{id}', "AnuncioController@destroy");
Route::get('/anuncio/{id}', "AnuncioController@show");

// Comentários
Route::post('/createcomentario', "ComentarioController@create");
Route::post('/updatecomentario/{id}', "ComentarioController@update");
Route::get('/deletecomentario/{id}', "ComentarioController@destroy");
Route::get('/comentario/{id}', "ComentarioController@show");

// Buscas
Route::post('/createbusca', "BuscaController@create");
Route::post('/updatebusca/{id}', "BuscaController@update");
Route::get('/deletebusca/{id}', "BuscaController@destroy");
Route::get('/busca/{id}', "BuscaController@show");


