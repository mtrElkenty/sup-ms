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
            $table->integer('id_frais')->autoIncrement();
            $table->integer('frais');
            $table->string('libelle_frais')->unique('libelle_frais');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('matieres_evaluations_id_matiere_evaluation');
            $table->bigInteger('etudiants_id_etudiant');
            $table->integer('cycles_id_cycle');

            $table->foreign('cycles_id_cycle', 'FKfrais163605')->references('id_cycle')->on('cycles');
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
