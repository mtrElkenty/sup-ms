<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres_evaluations', function (Blueprint $table) {
            $table->integer('id_matiere_evaluation')->primary();
            $table->integer('matieres_id_matiere');
            $table->integer('evaluations_id_evaluation');
            $table->integer('jours_id_jour');
            $table->integer('horaires_id_horaire');
            $table->timestamp('created_at')->nullable()->default('current_timestamp()');
            
            $table->foreign('horaires_id_horaire', 'FKmatieres_e314928')->references('id_horaire')->on('horaires');
            $table->foreign('matieres_id_matiere', 'FKmatieres_e718083')->references('id_matiere')->on('matieres');
            $table->foreign('evaluations_id_evaluation', 'FKmatieres_e863964')->references('id_evaluation')->on('evaluations');
            $table->foreign('jours_id_jour', 'FKmatieres_e904873')->references('id_jour')->on('jours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matieres_evaluations');
    }
}
