<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->integer('id_seance')->autoIncrement();
            $table->boolean('seance_rattrapage')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->integer('horaires_id_horaire');
            $table->integer('jours_id_jour');
            $table->integer('professeurs_id_professeur');
            $table->integer('niveaux_id_niveau');
            $table->integer('filieres_id_filiere');
            $table->integer('matieres_id_matiere');

            $table->foreign('professeurs_id_professeur', 'FKseances163979')->references('id_professeur')->on('professeurs');
            $table->foreign('horaires_id_horaire', 'FKseances35255')->references('id_horaire')->on('horaires');
            $table->foreign('filieres_id_filiere', 'FKseances483396')->references('id_filiere')->on('filieres');
            $table->foreign('niveaux_id_niveau', 'FKseances498737')->references('id_niveau')->on('niveaux');
            $table->foreign('jours_id_jour', 'FKseances716533')->references('id_jour')->on('jours');
            $table->foreign('matieres_id_matiere', 'FKseances903323')->references('id_matiere')->on('matieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seances');
    }
}
