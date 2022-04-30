<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Persona', function (Blueprint $table) {
            $table->foreignId('Codigo')->nullable();
            $table->string('Nombre', 200);
            $table->string('Apellido', 200);
            $table->integer('Identidad');
            $table->enum('Sexo', ['f','m']);
            $table->enum('Estado Civil', ['s', 'd', 'c', 'v']);
            $table->integer('Edad');
            $table->string('Direccion', 200);
            $table->enum('Tipo', ['n', 'j']);
            $table->string('Estado', 1);
            $table->string('Usuario de Registro', 255);
            $table->datetime('Fecha de Registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
};
