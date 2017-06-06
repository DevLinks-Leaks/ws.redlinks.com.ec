<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSucursalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('empresa_id');
			$table->integer('orden')->nullable();
			$table->string('qr',50)->nullable();
			$table->string('nombre',100);
			$table->string('direccion',150);
			$table->string('telefono',30)->nullable();
			$table->string('longitud_map',20);
			$table->string('latitud_map',20);
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
        Schema::dropIfExists('sucursales');
    }
}
