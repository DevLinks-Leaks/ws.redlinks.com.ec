<?php

use Illuminate\Database\Seeder;

class InteresesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array (
			array("nombre"=>"Entretenimiento", "descripcion"=>"Entretenimiento"),
			array("nombre"=>"Restaurantes", "descripcion"=>"Restaurantes"),
			array("nombre"=>"Moda", "descripcion"=>"Moda"),
			array("nombre"=>"Belleza", "descripcion"=>"Belleza"),
			array("nombre"=>"Tecnología", "descripcion"=>"Tecnología")
		);
		DB::table('intereses')->insert($data);
    }
}
