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
            $table->integer('id_evaluation')->primary();
            $table->string('type');
            $table->string('libelle_evaluation');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->integer('filieres_id_filiere');
            $table->integer('niveaux_id_niveau');
            $table->integer('semestres_id_semestre');
            
            $table->foreign('filieres_id_filiere', 'FKevaluation303770')->references('id_filiere')->on('filieres');
            $table->foreign('semestres_id_semestre', 'FKevaluation398125')->references('id_semestre')->on('semestres');
            $table->foreign('niveaux_id_niveau', 'FKevaluation863093')->references('id_niveau')->on('niveaux');
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
