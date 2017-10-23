<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function(Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('id_caja')->unsigned();
            $table->double('monto');
            $table->integer('id_banco')->unsigned();
            $table->string('detalle');
            $table->foreign('id_caja')->references('id')->on('cajas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('detalles');
    }
}
