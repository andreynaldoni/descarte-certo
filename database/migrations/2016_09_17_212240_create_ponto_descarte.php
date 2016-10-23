<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePontoDescarte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponto_descarte', function (Blueprint $table) {
            $table->increments('cd_ponto_descarte');
            $table->string('nm_ponto_descarte', 100);
            $table->string('ds_ponto_descarte', 500);
            $table->string('cd_latitude', 50);
            $table->string('cd_longitude', 50);
        });

        Schema::create('categoria_objeto_ponto_descarte', function (Blueprint $table) {
            $table->increments('cd_controle');

            $table->integer('cd_categoria_objeto')->unsigned()->index();
            $table->foreign('cd_categoria_objeto')->references('cd_categoria_objeto')->on('categoria_objeto')->onDelete('cascade');

            $table->integer('cd_ponto_descarte')->unsigned()->index();
            $table->foreign('cd_ponto_descarte')->references('cd_ponto_descarte')->on('ponto_descarte')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ponto_descarte');
        Schema::dropIfExists('categoria_objeto_ponto_descarte');
    }
}
