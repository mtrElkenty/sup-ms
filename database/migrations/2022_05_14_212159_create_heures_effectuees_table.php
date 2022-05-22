<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeuresEffectueesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heures_effectuees', function (Blueprint $table) {
            $table->integer('id_heure_effectuee')->autoIncrement();
            $table->timestamp('created_at')->useCurrent();
            $table->integer('professeurs_id_professeur');

            $table->foreign('professeurs_id_professeur', 'FKheures_eff664733')->references('id_professeur')->on('professeurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heures_effectuees');
    }
}
