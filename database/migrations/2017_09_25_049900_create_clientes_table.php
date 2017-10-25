<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('ci')->unique();
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('correo')->correo();
            $table->integer('telefono');
            $table->integer('id_banco')->unsigned();
            $table->foreign('id_banco')->references('id')->on('bancos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('clientes');
    }
}
