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
        Schema::create('cat_carrera', function (Blueprint $table) {
            $table->string('cve_carrera',3)->primary();
            $table->string('cve_area_academica',2)->index();
            $table->integer('ventanilla');
            $table->string('carrera',100);
            $table->string('carrera_sa',100);
            $table->string('carrera_fem',60);
            $table->string('carrera_mas',60);
            $table->string('carrera_abr',50);
            $table->integer('semestres_dm');
            $table->integer('semestres_carr');
            $table->integer('creditos');
            $table->boolean('vigente');
            $table->boolean('visible');
            $table->string('cve_dui',3);
            $table->string('cve_nueva',2);
            $table->string('cve_finanzas',10);
            $table->string('cve_nomina',3);
            $table->string('cve_admision',5);
            $table->string('cve_subes',10);
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
        Schema::dropIfExists('cat_carrera');
    }
};
