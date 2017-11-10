<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('texto');
            $table->integer('id_comentarista')->unsigned();
            
            $table->integer('id_prestador')->unsigned();
            
            $table->foreign("id_comentarista")->references("id")->on("usuarios")->onDelete("cascade");
            $table->foreign("id_prestador")->references("id")->on("usuarios")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("comentarios");
    }
}