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
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_caja')->unique();
            $table->float('monto_apertura');
            $table->float('total_productos')->nullable();
            $table->float('total_servicios');
            $table->float('total_capital_utilizado');
            $table->float('total_depositos');
            $table->float('total_impresiones')->nullable();
            $table->float('total_recargas')->nullable();
            $table->float('monto_cierre')->nullable();
            $table->json('bancos')->nullable();
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
        Schema::dropIfExists('cajas');
    }
};
