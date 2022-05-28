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
            $table->integer('employes_id_employe');
            
            $table->foreign('employes_id_employe', 'FKheures_eff774617')->references('id_employe')->on('employes');
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
