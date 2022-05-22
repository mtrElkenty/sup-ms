<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresPofesseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres_pofesseurs', function (Blueprint $table) {
            $table->integer('id_matiere_pofesseur')->autoIncrement();
            $table->integer('matieres_id_matiere');
            $table->integer('professeurs_id_professeur');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('matieres_id_matiere', 'FKmatieres_p174722')->references('id_matiere')->on('matieres');
            $table->foreign('professeurs_id_professeur', 'FKmatieres_p729565')->references('id_professeur')->on('professeurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matieres_pofesseurs');
    }
}
