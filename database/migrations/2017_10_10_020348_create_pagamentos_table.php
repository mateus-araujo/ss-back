<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valor');
            $table->integer("id_plano")->unsigned();
            $table->integer("id_prestador")->unsigned();
            $table->date("data_vencimento");
            $table->date("data_pagamento");

            $table->foreign("id_plano")->references("id")->on("planos")->onDelete("cascade");
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
        Schema::drop("pagamentos");
    }
}
