<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetaHabienteEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta_habiente_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empr_id');
            $table->integer('tarj_hab_id');
            $table->string('campo_1')->nullable();
            $table->string('campo_2')->nullable();
            $table->string('campo_3')->nullable();
            $table->string('campo_4')->nullable();
            $table->string('campo_5')->nullable();
            $table->string('campo_6')->nullable();
            $table->string('campo_7')->nullable();
            $table->string('campo_8')->nullable();
            $table->string('campo_9')->nullable();
            $table->string('campo_10')->nullable();
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
        Schema::dropIfExists('tarjeta_habiente_empresas');
    }
}
