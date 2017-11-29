<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_menu', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rol')->unsigned();
            $table->integer('id_menu')->unsigned();
            $table->foreign('id_rol')->references('id')->on('rols')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('rol_menu');
    }
}
