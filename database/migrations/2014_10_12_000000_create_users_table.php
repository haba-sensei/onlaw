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
            $table->id();
            $table->enum('document', ['RUC', 'CEDULA']);
            $table->string('num_document', 15);
            $table->string('noveno_numero', 10);
            $table->string('fullname' );
            $table->string('email')->unique();
            $table->string('dni_pasaporte');
            $table->string('telefono');
            $table->string('direccion', 191);
            $table->string('password');
            $table->enum('estado', [1, 0]);
            $table->string('device_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * $table->string('profile_photo_path', 2048)->nullable();
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}