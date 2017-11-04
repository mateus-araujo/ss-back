<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestadores', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("usuario_id")->unsigned();
            $table->string("telefone");
            $table->string("celular");
            $table->string("cep");
            $table->string("bairro");
            $table->string("cidade");
            $table->string("estado");
            $table->string("numero");
            $table->integer("id_serv_1")->unsigned()->nullable();
            $table->integer("id_serv_2")->unsigned()->nullable();
            $table->integer("id_serv_3")->unsigned()->nullable();
            $table->string("descricao");
            $table->string("avaliacao");
            $table->string("foto");
            $table->integer("tipo"); // se é pessoa jurídica ou física

            $table->foreign("usuario_id")->references("id")->on("usuarios")->onDelete("cascade");
            $table->foreign("id_serv_1")->references("id")->on("servicos")->onDelete("cascade");
            $table->foreign("id_serv_2")->references("id")->on("servicos")->onDelete("cascade");
            $table->foreign("id_serv_3")->references("id")->on("servicos")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("prestadores");
    }
}
