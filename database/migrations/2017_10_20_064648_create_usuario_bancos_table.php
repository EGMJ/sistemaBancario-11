<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_bancos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('color');
            $table->string('font_family');
            $table->string('font_size');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_banco')->unsigned();
            $table->integer('id_rol')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_banco')->references('id')->on('bancos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_rol')->references('id')->on('rols')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('usuario_bancos');
    }
}
