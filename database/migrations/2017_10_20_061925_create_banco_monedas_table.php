<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBancoMonedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banco_monedas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_moneda')->unsigned();
            $table->integer('id_banco')->unsigned();
            $table->foreign('id_moneda')->references('id')->on('monedas');
            $table->foreign('id_banco')->references('id')->on('bancos');
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
        Schema::drop('banco_monedas');
    }
}
