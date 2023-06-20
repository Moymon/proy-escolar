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
        Schema::table('cat_materia', function (Blueprint $table) {
            $table->string('cve_materia',6)->primary();
            $table->string('cve_mat_uaslp',10);
            $table->string('cve_area',3)->index();

            $table->integer('creditos')->nullable();
            $table->string('nombre_l',150)->nullable();
            $table->string('nombre_c',50)->nullable();

            $table->string('nombre_ing',150);
            
            $table->integer('examenes')->nullable();
            $table->boolean('laboratorio')->nullable();
            $table->boolean('lab_oboratorio')->nullable();
            $table->boolean('lab_resultado')->nullable();
            $table->boolean('calificacion_lit')->nullable();
            $table->integer('horas_teoria')->nullable();
            $table->integer('horas_lab')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_materia');
    }
};
