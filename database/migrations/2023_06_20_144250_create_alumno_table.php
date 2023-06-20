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
        Schema::create('alumno', function (Blueprint $table) {
            $table->string('id_alumno', 12)->unique();
            $table->string('cve_unica', 7);
            $table->string('nombre', 100);
            $table->string('nombres', 60);
            $table->string('paterno', 50);
            $table->string('materno', 50);

            $table->primary('id_alumno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno');
    }
};
