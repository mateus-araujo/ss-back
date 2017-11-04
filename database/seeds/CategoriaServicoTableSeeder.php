<?php

use Illuminate\Database\Seeder;

class CategoriaServicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categoria_servicos")->insert([
            ["nome" => "Domesticos"],
            ["nome" => "Eletricistas"],
            ["nome" => "Mecanicos"],
            ["nome" => "Limpeza"]
        ]);
    }
}
