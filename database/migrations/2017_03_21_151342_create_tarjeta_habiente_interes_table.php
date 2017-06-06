<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetaHabienteInteresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta_habiente_intereses', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('interes_id');
			$table->integer('tarj_hab_id');
			$table->boolean('interesado')->default(false);
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
        Schema::dropIfExists('tarjeta_habiente_intereses');
    }
}
