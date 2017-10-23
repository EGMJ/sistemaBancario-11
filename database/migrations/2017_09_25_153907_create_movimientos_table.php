<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function(Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('id_caja')->unsigned();
            $table->double('monto');
            $table->integer('id_banco')->unsigned();
            $table->integer('id_cuenta')->unsigned();
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
        Schema::drop('movimientos');
    }
}
