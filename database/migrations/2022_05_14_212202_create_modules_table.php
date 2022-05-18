<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->string('libelle_module')->unique('libelle_module');
            $table->integer('id_modules')->primary();
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->string('code_module')->unique('code_module');
            $table->integer('filieresid_filiere');
            $table->integer('semestresid_semestre');
            
            $table->foreign('semestresid_semestre', 'FKmodules283234')->references('id_semestre')->on('semestres');
            $table->foreign('filieresid_filiere', 'FKmodules7677')->references('id_filiere')->on('filieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
