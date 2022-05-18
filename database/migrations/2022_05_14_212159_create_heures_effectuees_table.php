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
            $table->integer('id_heure_effectuee')->primary();
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->integer('professeursid_professeur');
            
            $table->foreign('professeursid_professeur', 'FKheures_eff664733')->references('id_professeur')->on('professeurs');
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
