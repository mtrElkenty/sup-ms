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
            $table->integer('employes_id_employe');
            $table->integer('roles_id_role');

            $table->foreign('employe_id_employe', 'FKusers175237')->references('id_employe')->on('employes');
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
