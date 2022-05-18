<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filieres', function (Blueprint $table) {
            $table->integer('id_filiere')->primary();
            $table->string('code_filiere')->unique('code_filiere');
            $table->string('libelle_filiere')->unique('libelle_filiere');
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->integer('cyclesid_cycle');
            
            $table->foreign('cyclesid_cycle', 'FKfilieres144308')->references('id_cycle')->on('cycles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filieres');
    }
}
