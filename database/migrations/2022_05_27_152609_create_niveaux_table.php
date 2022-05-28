<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiveauxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveaux', function (Blueprint $table) {
            $table->integer('id_niveau')->primary();
            $table->string('libelle_niveau')->unique('libelle_niveau');
            $table->timestamp('created_at')->nullable();
            $table->integer('cycles_id_cycle');
            
            $table->foreign('cycles_id_cycle', 'FKniveaux752647')->references('id_cycle')->on('cycles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveaux');
    }
}
