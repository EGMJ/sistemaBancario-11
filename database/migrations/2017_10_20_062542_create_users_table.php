<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('paterno', 30);
            $table->string('materno', 30)->nullable();
            $table->enum('genero', ['Masculino', 'Femenino']);
            $table->string('email', 30)->unique();
            $table->string('password', 200);
            $table->string('color', 15);
            $table->string('fontFamily', 30);
            $table->string('fontSize', 10);
            $table->integer('id_banco')->unsigned()->nullable();
            $table->integer('id_rol')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_banco')->references('id')->on('bancos');
            $table->foreign('id_rol')->references('id')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
