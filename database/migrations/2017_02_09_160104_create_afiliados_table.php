<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfiliadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo',1);
            $table->string('num_identificacion',15);
            $table->string('nombres',100)->nullable();
            $table->string('apellidos',100)->nullable();
            $table->string('correo',50)->nullable();
            $table->string('telefono',50)->nullable();
            /*En caso de ser empresa*/
            $table->string('razon_social',100)->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('contacto',100)->nullable();
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
        Schema::dropIfExists('afiliados');
    }
}
