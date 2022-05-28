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
            $table->integer('id_matiere_pofesseur')->primary();
            $table->integer('matieres_id_matiere');
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->integer('employes_id_employe');
            
            $table->foreign('matieres_id_matiere', 'FKmatieres_p174722')->references('id_matiere')->on('matieres');
            $table->foreign('employes_id_employe', 'FKmatieres_p534451')->references('id_employe')->on('employes');
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
