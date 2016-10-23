<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConteudoObjeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteudo_objeto', function (Blueprint $table) {
            $table->increments('cd_conteudo_objeto');
            $table->string('nm_conteudo_objeto', 100);
            $table->longText('ds_conteudo_objeto');
            $table->string('ds_caminho_imagem');
            $table->string('ds_caminho_video');
            $table->string('ic_tipo', 50);

            $table->integer('cd_objeto_descarte')->unsigned()->index();
            $table->foreign('cd_objeto_descarte')->references('cd_objeto_descarte')->on('objeto_descarte')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conteudo_objeto');
    }
}
