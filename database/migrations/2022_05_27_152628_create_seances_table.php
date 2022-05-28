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
            $table->integer('id_seance')->primary();
            $table->boolean('seance_rattrapage')->default(0);
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->integer('horaires_id_horaire');
            $table->integer('jours_id_jour');
            $table->integer('professeurs_id_professeur');
            $table->integer('niveaux_id_niveau');
            $table->integer('filieres_id_filiere');
            $table->integer('matieres_id_matiere');
            $table->integer('employes_id_employe');
            
            $table->foreign('niveaux_id_niveau', 'FKseances321330')->references('id_niveau')->on('niveaux');
            $table->foreign('horaires_id_horaire', 'FKseances35255')->references('id_horaire')->on('horaires');
            $table->foreign('employes_id_employe', 'FKseances457381')->references('id_employe')->on('employes');
            $table->foreign('filieres_id_filiere', 'FKseances483396')->references('id_filiere')->on('filieres');
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
