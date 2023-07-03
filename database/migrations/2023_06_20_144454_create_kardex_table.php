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
        Schema::create('kardex_lic', function (Blueprint $table) {
            $table->integer('folio_kardex_lic')->unique();

            //$table->foreign('id_alumno')->constrained('alumno');
            //$table->foreign('cve_materia')->constrained('cat_materia');

            $table->string('id_alumno', 12);

            $table->foreign('id_alumno')
                ->references('id_alumno')
                ->on('alumno');

            $table->string('cve_materia', 6);

            $table->foreign('cve_materia')
                ->references('cve_materia')
                ->on('cat_materia');

            $table->string('calificacion', 3)->nullable();
            
            $table->primary('folio_kardex_lic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kardex');
    }
};
