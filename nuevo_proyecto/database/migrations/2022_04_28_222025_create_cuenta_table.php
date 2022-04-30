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
        Schema::create('Cuenta', function (Blueprint $table) {
            $table->foreignId('Codigo')->nullable();
            $table->string('Numero Cuenta', 20);
            $table->integer('Tipo Cuenta', 50);
            $table->double('Saldo Cuenta');
            $table->enum('Estado Cuenta', ['1','0']);
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
        Schema::dropIfExists('cuenta');
    }
};