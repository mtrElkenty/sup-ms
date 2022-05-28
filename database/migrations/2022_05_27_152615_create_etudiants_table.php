<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->bigInteger('id_etudiant')->primary();
            $table->string('matricule')->unique('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->char('NNI', 10)->unique('NNI');
            $table->string('telephone')->unique('telephone');
            $table->string('email')->nullable()->unique('email');
            $table->string('adress');
            $table->string('ville');
            $table->string('pays');
            $table->string('sexe');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('situation_famille');
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->integer('parents_infos_id_parent');
            $table->integer('niveaux_id_niveau');
            $table->integer('filieres_id_filiere');
            
            $table->foreign('filieres_id_filiere', 'FKetudiants135037')->references('id_filiere')->on('filieres');
            $table->foreign('niveaux_id_niveau', 'FKetudiants301901')->references('id_niveau')->on('niveaux');
            $table->foreign('parents_infos_id_parent', 'FKetudiants563462')->references('id_parent')->on('parents_infos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
