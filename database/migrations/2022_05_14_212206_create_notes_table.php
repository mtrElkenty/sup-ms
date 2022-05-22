<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->integer('id_note')->autoIncrement();
            $table->float('cc')->default(0);
            $table->float('cp')->default(0);
            $table->float('moyenne_generale')->default(0);
            $table->float('cp_rattrapage')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->integer('semestres_id_semestre');
            $table->bigInteger('etudiants_id_etudiant');
            $table->integer('matieres_id_matiere');
            $table->integer('annees_scolaires_id_annee_scolaire');

            $table->foreign('matieres_id_matiere', 'FKnotes299100')->references('id_matiere')->on('matieres');
            $table->foreign('annees_scolaires_id_annee_scolaire', 'FKnotes33897')->references('id_annee_scolaire')->on('annees_scolaires');
            $table->foreign('etudiants_id_etudiant', 'FKnotes623834')->references('id_etudiant')->on('etudiants');
            $table->foreign('semestres_id_semestre', 'FKnotes982867')->references('id_semestre')->on('semestres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
