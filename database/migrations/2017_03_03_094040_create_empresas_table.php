<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
			$table->string('ruc',20)->default('N/A');
			$table->string('razon_social',100);
			$table->string('beneficio',50);
			$table->string('nombre_comercial',100);
			$table->integer('categoria_id')->nullable();
			$table->integer('orden')->nullable();
			$table->string('direccion',150)->nullable();
			$table->string('telefono',50)->nullable();
			$table->string('correo',50)->nullable();
			$table->string('twitter',50)->nullable();
			$table->string('facebook',100)->nullable();
			$table->string('instagram',50)->nullable();
			$table->string('website',50)->nullable();
			$table->string('ruta_img_small',200)->nullable();
			$table->string('ruta_img_large',200)->nullable();
			$table->string('tipo',5);/*LA: Locales afiliados, CL: Clientes, AM: Ambos*/
            $table->date('inicio_carnet')->nullable();
            $table->date('fin_carnet')->nullable();
			$table->string('estado',5)->default('A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
