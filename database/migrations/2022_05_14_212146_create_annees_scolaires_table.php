<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneesScolairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annees_scolaires', function (Blueprint $table) {
            $table->integer('id_annee_scolaire')->autoIncrement();
            $table->string('annee_scolaire')->unique();
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annees_scolaires');
    }
}
