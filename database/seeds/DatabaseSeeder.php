<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
		$this->call(CategoriasTableSeeder::class);
		$this->call(EmpresasTableSeeder::class);
		$this->call(SucursalesTableSeeder::class);
		$this->call(BeneficiosTableSeeder::class);
		$this->call(InteresesTableSeeder::class);
    }
}
