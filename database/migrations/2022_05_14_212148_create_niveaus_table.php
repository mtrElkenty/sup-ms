<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiveausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveaus', function (Blueprint $table) {
            $table->integer('id_niveau')->primary();
            $table->string('libelle_niveau')->unique('libelle_niveau');
            $table->timestamp('created_at')->nullable();
            $table->integer('cyclesid_cycle');
            
            $table->foreign('cyclesid_cycle', 'FKniveaus198742')->references('id_cycle')->on('cycles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveaus');
    }
}
