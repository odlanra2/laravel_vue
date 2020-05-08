<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->string('Peso');
            $table->string('Precio');
            $table->integer('categoria_id')->unsigned();
            $table->string('foto');
            $table->timestamps();
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
