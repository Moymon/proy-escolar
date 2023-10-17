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
        Schema::create('sinodal_ase_lic', function (Blueprint $table) {
            $table->integer('folio_ase_lic')->unique();
            $table->string('nombre', 150);
            $table->integer('rpe_sinodal');
            
            $table->primary('folio_ase_lic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinodal_ase_lic');
    }
};
