<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('id_employee')->primary();
            $table->string('nom');
            $table->string('prenom');
            $table->char('NNI', 10)->unique('NNI');
            $table->string('telephone_1')->unique('telephone_1');
            $table->string('telephone_2')->nullable();
            $table->string('email')->nullable()->unique('email');
            $table->string('adress');
            $table->string('ville');
            $table->string('pays');
            $table->string('sexe');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->integer('fonctions_id_fonction');
            
            $table->foreign('fonctions_id_fonction', 'FKemployees688295')->references('id_fonction')->on('fonctions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
