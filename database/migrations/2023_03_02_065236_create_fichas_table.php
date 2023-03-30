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
        Schema::create('fichas', function (Blueprint $table) {
            $table->id();
          //  $table->unsignedBigInteger('persona_id')->nullable();
            $table->string('ingreso')->nullable();
           // $table->string('nomEmpresa')->nullable();
            $table->string('tipoVehiculo')->nullable();
            $table->string('estadoVehiculo')->nullable();
            $table->string('revTecnica')->nullable();
            $table->string('segVehiculo')->nullable();
            $table->string('segPersonal')->nullable();
            $table->string('patentevehiculo')->nullable();
            $table->string('patenteacoplado')->nullable();
            $table->string('tipoIngreso')->nullable();
            $table->string('materialSiNo')->nullable();
            $table->string('visitasector')->nullable();
            $table->string('provieneDe')->nullable();
            $table->string('TipoDeCarga')->nullable();
            $table->string('cargaPara')->nullable();
            
            $table->string('contactoriogrande1')->nullable();
            $table->string('disponeepp')->nullable();
            $table->string('entregaepp')->nullable();
            $table->string('nombrevigilantein')->nullable();
            $table->string('salida')->nullable();
            $table->string('salidamateriales')->nullable();
            $table->string('tipomateriales')->nullable();
            $table->string('remito')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('contactoriogrande2')->nullable();
            $table->string('hora')->nullable();
            $table->string('autorizasalida')->nullable();
            $table->string('nombrevigilanteout')->nullable();
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
        Schema::dropIfExists('fichas');
    }
};
