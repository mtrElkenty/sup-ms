<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->integer('id_evaluation')->autoIncrement();
            $table->string('type');
            $table->string('libelle_evaluation');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('filieres_id_filiere');
            $table->integer('niveaux_id_niveau');
            $table->integer('semestres_id_semestre');

            $table->foreign('semestres_id_semestre', 'FKevaluation294129')->references('id_semestre')->on('semestres');
            $table->foreign('filieres_id_filiere', 'FKevaluation303770')->references('id_filiere')->on('filieres');
            $table->foreign('niveaux_id_niveau', 'FKevaluation685686')->references('id_niveau')->on('niveaux');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
