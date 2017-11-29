<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function(Blueprint $table) {
            $table->increments('id');
            $table->double('monto');
            $table->integer('plaso');
            $table->double('interes');
            $table->double('monto_pagado');
            $table->double('saldo');
            $table->integer('id_cuenta')->unsigned();
            $table->integer('id_banco')->unsigned();
            $table->foreign('id_banco')->references('id')->on('bancos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_cuenta')->references('id')->on('cuentas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('creditos');
    }
}
