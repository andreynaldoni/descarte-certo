<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjetoDescarte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objeto_descarte', function (Blueprint $table) {
            $table->increments('cd_objeto_descarte');
            $table->string('nm_objeto_descarte', 100);
            $table->string('ds_objeto_descarte', 500)->nullable();

            $table->integer('cd_categoria_objeto')->unsigned()->index();
            $table->foreign('cd_categoria_objeto')->references('cd_categoria_objeto')->on('categoria_objeto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objeto_descarte');
    }
}
