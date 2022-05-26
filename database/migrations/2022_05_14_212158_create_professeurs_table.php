<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professeurs', function (Blueprint $table) {
            $table->integer('id_professeur')->autoIncrement();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->integer('employes_id_employe');

            $table->foreign('employes_id_employe', 'FKprofesseur740848')->references('id_employe')->on('employes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professeurs');
    }
}
