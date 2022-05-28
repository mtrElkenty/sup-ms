<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->integer('id_matiere')->primary();
            $table->string('code_matiere')->unique('code_matiere');
            $table->string('libelle_matiere');
            $table->integer('coefficient');
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->integer('modules_id_modules');
            
            $table->foreign('modules_id_modules', 'FKmatieres572677')->references('id_modules')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matieres');
    }
}
