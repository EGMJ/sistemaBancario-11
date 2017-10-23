<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBackupRestoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backup_restores', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('ruta');
            $table->dateTime('fecha');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_banco')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_banco')->references('id')->on('bancos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('backup_restores');
    }
}
