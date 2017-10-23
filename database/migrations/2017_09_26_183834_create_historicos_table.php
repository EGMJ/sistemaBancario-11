<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos', function(Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->integer('id_cuenta')->unsigned();
            $table->double('monto');
            $table->double('saldo');
            $table->string('detalle');
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
        Schema::drop('historicos');
    }
}
