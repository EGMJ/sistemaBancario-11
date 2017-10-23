<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCambiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambios', function(Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->double('valor');
            $table->integer('id_moneda')->unsigned();
            $table->foreign('id_moneda')->references('id')->on('monedas');
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
        Schema::drop('cambios');
    }
}
