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
        Schema::create('examen_lic', function (Blueprint $table) {
            $table->integer('folio_exa_lic')->unique();
            $table->string('cve_materia', 6);

            $table->foreign('cve_materia')
                ->references('cve_materia')
                ->on('cat_materia');
            $table->string('tipo', 3);
            $table->integer('hora');
            $table->integer('salon');
            $table->dateTime('fecha');

            $table->integer('folio_ase_lic');
            $table->string('periodo', 50);

            $table->foreign('folio_ase_lic')
                ->references('folio_ase_lic')
                ->on('sinodal_ase_lic');

            $table->primary('folio_exa_lic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen_lic');
    }
};
