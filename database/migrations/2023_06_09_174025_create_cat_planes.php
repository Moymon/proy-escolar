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
        Schema::create('cat_planes', function (Blueprint $table) {
            $table->id('folio_plan');
            $table->string('cve_materia',6)->index();
            $table->string('cve_carrera',2)->index();
            $table->string('cve_cacei',5);
            $table->integer('cve_tipo');
            $table->integer('nivel');
            $table->integer('columna');
            $table->boolean('optativa');
            $table->dateTime('fecha_autorizacion');
            $table->dateTime('fecha_vigencia');
            $table->dateTime('fecha_actualizacion');
            $table->boolean('vigente');
            $table->string('version',20);
            $table->timestamps();

            $table->unique(['cve_materia','cve_carrera','version']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_planes');
    }
};
