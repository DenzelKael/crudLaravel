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
        Schema::create('bancos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')
            ->constrained('users'); 
            $table->foreignId('id_plataforma')
            ->constrained('plataformas'); 
            $table->date('fecha_cierre')->nullable();
            $table->float('monto_apertura');
            $table->float('total_capital_utilizado')->nullable();
            $table->float('total_depositos')->nullable();
            $table->float('total_retiros')->nullable();
            $table->float('monto_cierre')->nullable();
            $table->float('diferencia')->nullable();
            $table->integer('total_movimientos')->nullable();
            $table->string('estado');
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
        Schema::dropIfExists('bancos');
    }
};
