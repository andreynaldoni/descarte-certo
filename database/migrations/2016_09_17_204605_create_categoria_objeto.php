<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaObjeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_objeto', function (Blueprint $table) {
            $table->increments('cd_categoria_objeto');
            $table->string('nm_categoria_objeto', 100);
            $table->string('ds_categoria_objeto', 500)->nullable();
            $table->string('im_categoria_objeto', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_objeto');
    }
}
