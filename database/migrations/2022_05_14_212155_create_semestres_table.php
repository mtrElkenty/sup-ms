<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semestres', function (Blueprint $table) {
            $table->integer('id_semestre')->primary();
            $table->string('libelle_semestre')->unique('libelle_semestre');
            $table->timestamp('created_at')->nullable();
            $table->integer('niveaus_id_niveau');
            
            $table->foreign('niveaus_id_niveau', 'FKsemestres416517')->references('id_niveau')->on('niveaus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semestres');
    }
}
