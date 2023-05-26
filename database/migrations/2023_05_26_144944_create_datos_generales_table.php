<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_generales', function (Blueprint $table) {
            $table->id('id');
            $table->string('institucion',100);
            $table->string('url',50);
            $table->string('version_git',50);
            $table->string('nombre_version',50);
            $table->string('correo',25);
            $table->integer('telefono');
            $table->integer('ext');
            $table->string('master',100);
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
        Schema::dropIfExists('datos_generales');
    }
};
