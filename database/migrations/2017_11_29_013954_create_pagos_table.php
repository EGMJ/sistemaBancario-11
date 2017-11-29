<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function(Blueprint $table) {
            $table->increments('id');
            $table->double('monto');
            $table->double('saldo');
            $table->date('fechaPago');
            $table->integer('retraso');
            $table->integer('id_credito')->unsigned();
            $table->integer('id_banco')->unsigned();
            $table->foreign('id_credito')->references('id')->on('creditos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('pagos');
    }
}
