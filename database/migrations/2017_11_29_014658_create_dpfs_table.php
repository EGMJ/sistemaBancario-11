<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDpfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpfs', function(Blueprint $table) {
            $table->increments('id');
            $table->double('monto');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->integer('id_cliente')->unsigned();
            $table->integer('id_tipoDpf')->unsigned();
            $table->integer('id_banco')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tipoDpf')->references('id')->on('tipo_dpfs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('dpfs');
    }
}
