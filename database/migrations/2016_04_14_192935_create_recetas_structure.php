<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecetasStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->timestamps();
        });

        Schema::create('pasos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion');
            $table->integer('orden');
            $table->timestamps();
        });

        Schema::create('recetas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 255);
            $table->mediumText('descripcion');
            $table->smallInteger('duracion');
            $table->smallInteger('dificultad');
            $table->smallInteger('personas');
            $table->mediumText('fuente');
            $table->integer('valoracion');
            $table->unsignedInteger('categoria_id')->index();
            $table->unsignedInteger('pasos_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->timestamps();
            //$table->foreign('usuario_id')->references('id')->on('users');
            //$table->foreign('categoria_id')->references('id')->on('categorias');
            //$table->foreign('pasos_id')->references('id')->on('pasos')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recetas');
        Schema::drop('categorias');
        Schema::drop('pasos');

    }
}
