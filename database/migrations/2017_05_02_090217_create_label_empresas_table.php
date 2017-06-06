<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('label_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empresa_id');
            $table->enum('campo',[1,2,3,4,5,6,7,8,9,10])->comment('Ingresar valores entre 1 y 10');
            $table->string('nombre');
            $table->boolean('editable')->default(false);
            $table->timestamps();

            $table->unique(['campo','empresa_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('label_empresas');
    }
}
