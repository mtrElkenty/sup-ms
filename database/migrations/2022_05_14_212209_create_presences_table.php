<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->integer('id_presence')->autoIncrement();
            $table->boolean('present')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('etudiants_id_etudiant');
            $table->integer('seances_id_seance');

            $table->foreign('etudiants_id_etudiant', 'FKpresences345745')->references('id_etudiant')->on('etudiants');
            $table->foreign('seances_id_seance', 'FKpresences591900')->references('id_seance')->on('seances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presences');
    }
}
