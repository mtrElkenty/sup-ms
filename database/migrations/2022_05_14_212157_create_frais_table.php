<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frais', function (Blueprint $table) {
            $table->integer('id_frais')->primary();
            $table->integer('frais');
            $table->string('libelle_frais')->unique('libelle_frais');
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->integer('matieres_evaluationsid_matiere_evaluation');
            $table->bigInteger('etudiantsid_etudiant');
            $table->integer('cyclesid_cycle');
            
            $table->foreign('cyclesid_cycle', 'FKfrais163605')->references('id_cycle')->on('cycles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frais');
    }
}
