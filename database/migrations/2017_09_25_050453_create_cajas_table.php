<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->integer('id_sucursal')->unsigned();
            $table->integer('id_banco')->unsigned();
            $table->double('total');
            $table->foreign('id_sucursal')->references('id')->on('sucursals')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('cajas');
    }
}
