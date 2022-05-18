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
            $table->integer('id_professeur')->primary();
            $table->timestamp('created_at')->nullable()->default('current_timestamp()');
            $table->integer('employees_id_employee');
            
            $table->foreign('employees_id_employee', 'FKprofesseur740848')->references('id_employee')->on('employees');
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
