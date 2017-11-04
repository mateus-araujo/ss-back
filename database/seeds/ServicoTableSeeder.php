<?php

use Illuminate\Database\Seeder;

class ServicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("servicos")->insert([
            ["nome" => "Pintor", "id_categoria" => 1], 
            ["nome" => "Mecanico", "id_categoria" => 3], 
            ["nome" => "Dedetizacao", "id_categoria" => 4], 
            ["nome" => "Instalação elétrica", "id_categoria" => 2] 
            ]);
    }
}
