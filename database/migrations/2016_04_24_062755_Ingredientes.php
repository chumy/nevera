<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ingredientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 255);
            $table->timestamps();
        });

        Schema::create('receta_ingredientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->string('medida');
            $table->unsignedInteger('ingrediente_id')->index();
            $table->unsignedInteger('receta_id')->index();
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
        Schema::drop('receta_ingredientes');
        Schema::drop('ingredientes');
    }
}
