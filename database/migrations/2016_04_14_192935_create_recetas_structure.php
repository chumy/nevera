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
            $table->string('slug',100);
            $table->timestamps();
        });

        Schema::create('recetas', function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 255);
            $table->string('slug', 255);
            $table->mediumText('descripcion');
            $table->smallInteger('duracion');
            $table->smallInteger('dificultad');
            $table->smallInteger('personas');
            $table->mediumText('fuente');
            $table->integer('valoracion');
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });

        Schema::create('pasos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion');
            $table->integer('orden');
            $table->unsignedInteger('receta_id')->index();
            $table->timestamps();
            $table->foreign('receta_id')->references('id')->on('recetas')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pasos');
        Schema::drop('recetas');
        Schema::drop('categorias');
    }
}
