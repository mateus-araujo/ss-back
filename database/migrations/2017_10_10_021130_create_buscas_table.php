<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuscasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buscas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_categoria")->unsigned();
            $table->integer("id_servico")->unsigned();
            $table->string("texto_busca"); 
            
            $table->timestamp('created_at');

            $table->foreign("id_categoria")->references("id")->on("categoria_servicos")->onDelete("cascade");
            $table->foreign("id_servico")->references("id")->on("servicos")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() 
    {
        Schema::drop("buscas");
    }
}
