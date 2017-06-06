<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetaFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta_fisicas', function (Blueprint $table) {
            $table->increments('id');
			$table->string('tarj_codigo',100)->nullable();
			$table->integer('tarj_hab_empr_id');
			$table->date('valida_desde')->nullable();
			$table->date('valida_hasta')->nullable();
			$table->string('motivo_rechazo',500)->nullable();
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
        Schema::dropIfExists('tarjeta_fisicas');
    }
}
