<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas_fisicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf');
            $table->string('sexo');
            $table->string('curriculum');
            
            $table->integer("prestador_id")->unsigned();
            
            $table->timestamps();

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
        Schema::drop("pessoas_fisicas");
    }
}
