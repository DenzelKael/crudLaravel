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
    //protected $fillable=['id','id_archivo','id_plataforma','id_servicio', 'cantidad'];

        Schema::create('cuantificadores', function (Blueprint $table) {
            $table->id();
      /*       $table->foreignId('id_plataforma')
            ->constrained('plataformas');
            $table->foreignId('id_archivo')
            ->constrained('archivos'); */
           $table->string('sigla');
            $table->string('descripcion');
            $table->string('monto');
            $table->bigInteger('cantidad');
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
        Schema::dropIfExists('cuantificadores');
    }
};
