<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosPrestadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos_prestados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_servico")->unsigned();
            $table->integer("id_prestador")->unsigned();
            $table->string('data');
            $table->string('solicitante');
            $table->boolean('confirmado');
            
            $table->timestamps();

            $table->foreign("id_servico")->references('id')->on("servicos")->onDelete("cascade");
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
        Schema::drop("servicos_prestados");
    }
}
