<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('tarj_hab_id');
			$table->integer('sucursal_id')->nullable(); /*Local afiliado*/
			$table->string('qr',50);
			$table->dateTime('fecha_visita')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('longitud_map',50)->nullable();
			$table->string('latitud_map',50)->nullable();
			$table->string('estado',20)->default('ACTIVO');
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
        Schema::dropIfExists('visitas');
    }
}
