<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id_user')->autoIncrement();
            $table->string('username')->unique('username');
            $table->text('password');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('employees_id_employee');
            $table->integer('roles_id_role');

            $table->foreign('employees_id_employee', 'FKusers175237')->references('id_employee')->on('employees');
            $table->foreign('roles_id_role', 'FKusers917132')->references('id_role')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
