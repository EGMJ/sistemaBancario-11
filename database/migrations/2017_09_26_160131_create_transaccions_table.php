<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransaccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccions', function(Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha');
            $table->double('monto');
            $table->integer('id_banco')->unsigned();
            $table->integer('id_cuenta')->unsigned();
            $table->integer('id_cuenta_destino')->unsigned();
            $table->foreign('id_cuenta')->references('id')->on('cuentas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_cuenta_destino')->references('id')->on('cuentas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('transaccions');
    }
}
