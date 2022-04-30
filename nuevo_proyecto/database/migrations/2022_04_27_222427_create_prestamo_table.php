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
        Schema::create('prestamo', function (Blueprint $table) {
            $table->id();
            $table->double('IMPORTE_PRESTAMO');
            $table->double('INTERESES');
            $table->integer('PLAZO_ANUAL');
            $table->integer('N_PAGOS_ANUAL');
            $table->double('SALDO_FINAL');
            $table->date('FECHA_PRESTAMO');
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
        Schema::dropIfExists('prestamo');
    }
};
