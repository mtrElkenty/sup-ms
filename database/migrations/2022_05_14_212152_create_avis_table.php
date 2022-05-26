<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avis', function (Blueprint $table) {
            $table->integer('id_avis')->autoIncrement();
            $table->string('titre_avis')->nullable();
            $table->text('description_avis')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->integer('employes_id_employe');
            $table->integer('filieres_id_filiere');
            $table->integer('niveaux_id_niveau');

            $table->foreign('niveaux_id_niveau', 'FKavis19820')->references('id_niveau')->on('niveaux');
            $table->foreign('employes_id_employe', 'FKavis407633')->references('id_employe')->on('employes');
            $table->foreign('filieres_id_filiere', 'FKavis535321')->references('id_filiere')->on('filieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avis');
    }
}
