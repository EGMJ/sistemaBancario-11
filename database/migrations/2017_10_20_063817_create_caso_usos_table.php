<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCasoUsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caso_usos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('cod');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('id_menu')->unsigned();
            $table->foreign('id_menu')->references('id')->on('menus')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('caso_usos');
    }
}
