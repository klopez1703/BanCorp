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
        Schema::create('contabilidad', function (Blueprint $table) {
            $table->id();
            $table->string("Nombre Activo");
            $table->string("Valor Activo");
            $table->string("Nombre Pasivo");
            $table->string("valor Pasivo");
            $table->string("Nombre Patrimonio");
            $table->string("Valor Patrimonio");
            $table->string("Nombre Ingreso");
            $table->string("Valor Ingreso");
            $table->string("Nombre Egresos");
            $table->string("Valor Egreso");
            $table->string("Nombre compra");
            $table->string("Precio Compra");
            $table->string("Saldo Estado Resultado");
            $table->string("Saldo Balance general");
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
        Schema::dropIfExists('contabilidad');
    }
};
