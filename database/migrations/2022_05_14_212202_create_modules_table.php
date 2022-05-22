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
            $table->integer('id_modules')->autoIncrement();
            $table->string('libelle_module')->unique('libelle_module');
            $table->timestamp('created_at')->useCurrent();
            $table->string('code_module')->unique('code_module');
            $table->integer('filieres_id_filiere');
            $table->integer('semestres_id_semestre');

            $table->foreign('semestres_id_semestre', 'FKmodules283234')->references('id_semestre')->on('semestres');
            $table->foreign('filieres_id_filiere', 'FKmodules7677')->references('id_filiere')->on('filieres');
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
