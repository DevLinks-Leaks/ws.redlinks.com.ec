<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetaHabientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta_habientes', function (Blueprint $table) {
            $table->increments('id');
			$table->string('tipo_id',5);
			$table->string('num_id',20);
            $table->string('user',100);
            $table->string('pass',100);
			$table->string('nombre_1',25);
			$table->string('nombre_2',25)->nullable();
			$table->string('apellido_1',25);
			$table->string('apellido_2',25)->nullable();
			$table->date('fecha_ncto');
			$table->string('celular',15)->nullable();
			$table->string('correo',25)->nullable();
			$table->boolean('flag_intereses')->default(false);
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
        Schema::dropIfExists('tarjeta_habientes');
    }
}
