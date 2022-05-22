<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsRattrapagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions_rattrapages', function (Blueprint $table) {
            $table->integer('id_session_rattrapage')->autoIncrement();
            $table->timestamp('created_at')->useCurrent();
            $table->integer('matieres_id_matiere');
            $table->bigInteger('etudiants_id_etudiant');

            $table->foreign('matieres_id_matiere', 'FKsessions_r253830')->references('id_matiere')->on('matieres');
            $table->foreign('etudiants_id_etudiant', 'FKsessions_r794825')->references('id_etudiant')->on('etudiants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions_rattrapages');
    }
}
