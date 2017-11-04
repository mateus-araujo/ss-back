<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("valor"); 
            $table->integer("id_usuario_avaliador")->unsigned();
            $table->integer("id_prestador")->unsigned();
            $table->timestamp('created_at');

            $table->foreign("id_usuario_avaliador")->references("id")->on("usuarios")->onDelete("cascade");
            $table->foreign("id_prestador")->references("id")->on("prestadores")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("avaliacoes");
    }
}
