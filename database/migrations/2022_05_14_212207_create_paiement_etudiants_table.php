<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiement_etudiants', function (Blueprint $table) {
            $table->integer('id_paiement_etudiant')->autoIncrement();
            $table->float('montant_paye')->default(0);
            $table->float('montant_restant')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('etudiants_id_etudiant');
            $table->integer('frais_id_frais');

            $table->foreign('frais_id_frais', 'FKpaiement_e657389')->references('id_frais')->on('frais');
            $table->foreign('etudiants_id_etudiant', 'FKpaiement_e920434')->references('id_etudiant')->on('etudiants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiement_etudiants');
    }
}
