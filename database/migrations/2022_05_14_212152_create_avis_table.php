<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avis', function (Blueprint $table) {
            $table->integer('id_avis')->primary();
            $table->string('titre_avis')->nullable();
            $table->text('description_avis')->nullable();
            $table->timestamp('created_at')->default('current_timestamp()');
            $table->integer('employeesid_employee');
            $table->integer('filieresid_filiere');
            $table->integer('niveausid_niveau');
            
            $table->foreign('niveausid_niveau', 'FKavis19820')->references('id_niveau')->on('niveaus');
            $table->foreign('employeesid_employee', 'FKavis407633')->references('id_employee')->on('employees');
            $table->foreign('filieresid_filiere', 'FKavis535321')->references('id_filiere')->on('filieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avis');
    }
}
