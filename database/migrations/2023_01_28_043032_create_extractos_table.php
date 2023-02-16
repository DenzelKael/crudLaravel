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
        Schema::create('extractos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_banco')
                ->constrained('bancos')->onDelete('cascade');
            $table->foreignId('id_servicio')
                ->constrained('servicios');
            $table->date('fecha');
            $table->string('AG')->nullable( );
            $table->string('descripcion');
            $table->string('nro_documento');
            $table->string('monto');
            $table->string('deposito');
            $table->string('saldo');
            $table->string('sigla');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extractos');
    }
};
