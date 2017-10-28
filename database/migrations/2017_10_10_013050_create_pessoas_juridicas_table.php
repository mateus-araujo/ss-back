<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasJuridicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas_juridicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj');
            $table->string('nome_fantasia');
            $table->string('razao_social');
            
            $table->integer("prestador_id")->unsigned();

            $table->foreign("prestador_id")->references("id")->on("prestadores")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("pessoas_juridicas");
    }
}
 