<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('csv_data', function (Blueprint $table) {
            $table->id(); 
            $table->integer('TimeInt');
            $table->string('TimeStr');
            $table->float('AmperajeC1');
            $table->float('AmperajeC2');
            $table->float('AmperajeC3');
            $table->float('AmperajeC4');
            $table->float('AmperajeC5');
            $table->float('AmperajeG1');
            $table->float('AmperajeG2');
            $table->float('AmperajeG3');
            $table->float('Babor1');
            $table->float('Babor10');
            $table->float('Babor2');
            $table->float('Babor3');
            $table->float('Babor4');
            $table->float('Babor5');
            $table->float('Babor6');
            $table->float('Babor7');
            $table->float('Babor8');
            $table->float('Babor9');
            $table->float('Consumo_Instantaneo_MP');
            $table->float('Consumo_Total_MP');
            $table->float('Estribor1');
            $table->float('Estribor10');
            $table->float('Estribor2');
            $table->float('Estribor3');
            $table->float('Estribor4');
            $table->float('Estribor5');
            $table->float('Estribor6');
            $table->float('Estribor7');
            $table->float('Estribor8');
            $table->float('Estribor9');
            $table->float('Horas_Total_MP');
            $table->float('PotenciaCP');
            $table->float('PotenciaCT1');
            $table->float('PotenciaCT2');
            $table->float('PotenciaCT3');
            $table->float('PotenciaCT4');
            $table->float('PotenciaConsumida');
            $table->float('PotenciaG1');
            $table->float('PotenciaG2');
            $table->float('PotenciaG3');
            $table->float('PotenciaGEN');
            $table->float('PresionAceiteMP');
            $table->float('PresionAspiracionCP1');
            $table->float('PresionAspiracionCT1');
            $table->float('PresionAspiracionCT2');
            $table->float('PresionAspiracionCT3');
            $table->float('PresionAspiracionCT4');
            $table->float('PresionDescargaCP1');
            $table->float('PresionDescargaCT1');
            $table->float('PresionDescargaCT2');
            $table->float('PresionDescargaCT3');
            $table->float('PresionDescargaCT4');
            $table->float('PresionG1');
            $table->float('PresionG2');
            $table->float('PresionG3');
            $table->float('Presion_Reductora');
            $table->integer('RPM_MP');
            $table->float('TemperaturaADescargaCP1');
            $table->float('TemperaturaADescargaCT1');
            $table->float('TemperaturaADescargaCT2');
            $table->float('TemperaturaADescargaCT3');
            $table->float('TemperaturaADescargaCT4');
            $table->float('TemperaturaAceiteCT1');
            $table->float('TemperaturaAceiteCT2');
            $table->float('TemperaturaAceiteCT3');
            $table->float('TemperaturaAceiteCT4');
            $table->float('TemperaturaAceiteMP');
            $table->float('TemperaturaAguaMP');
            $table->float('TemperaturaAspiracionCP1');
            $table->float('TemperaturaAspiracionCT1');
            $table->float('TemperaturaAspiracionCT2');
            $table->float('TemperaturaAspiracionCT3');
            $table->float('TemperaturaAspiracionCT4');
            $table->float('TemperaturaG1');
            $table->float('TemperaturaG2');
            $table->float('TemperaturaG3');
            $table->float('Temperatura_Reductora');
            $table->float('VoltajeG1');
            $table->float('VoltajeG2');
            $table->float('VoltajeG3');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csv_data');
    }
};
