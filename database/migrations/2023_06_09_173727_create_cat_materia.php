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
        Schema::create('cat_materia', function (Blueprint $table) {
            $table->string('cve_materia',6)->primary();
            $table->string('cve_mat_uaslp',10);
            $table->string('cve_area',3)->index();
            $table->integer('creditos');
            $table->string('nombre_l',150);
            $table->string('nombre_c',50);
            $table->string('nombre_ing',150);
            $table->integer('examenes');
            $table->boolean('laboratorio');
            $table->boolean('lab_oboratorio');
            $table->boolean('lab_resultado');
            $table->boolean('calificacion_lit');
            $table->integer('horas_teoria');
            $table->integer('horas_lab');
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
        Schema::dropIfExists('cat_materia');
    }
};
