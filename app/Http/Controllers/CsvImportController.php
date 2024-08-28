<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CsvData;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class CsvImportController extends Controller
{
    public function import(Request $request)
    {
        
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        
        if (($handle = fopen($request->file('csv_file'), 'r')) !== FALSE) {
            $header = fgetcsv($handle, 1000, ','); 
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                
                $csvData = new CsvData();
                
               
                $csvData->TimeInt = $data[0];
                $csvData->TimeStr = $data[1];
                $csvData->AmperajeC1 = $data[2];
                $csvData->AmperajeC2 = $data[3];
                $csvData->AmperajeC3 = $data[4];
                $csvData->AmperajeC4 = $data[5];
                $csvData->AmperajeC5 = $data[6];
                $csvData->AmperajeG1 = $data[7];
                $csvData->AmperajeG2 = $data[8];
                $csvData->AmperajeG3 = $data[9];
                $csvData->Babor1 = $data[10];
                $csvData->Babor10 = $data[11];
                $csvData->Babor2 = $data[12];
                $csvData->Babor3 = $data[13];
                $csvData->Babor4 = $data[14];
                $csvData->Babor5 = $data[15];
                $csvData->Babor6 = $data[16];
                $csvData->Babor7 = $data[17];
                $csvData->Babor8 = $data[18];
                $csvData->Babor9 = $data[19];
                $csvData->Consumo_Instantaneo_MP = $data[20];
                $csvData->Consumo_Total_MP = $data[21];
                $csvData->Estribor1 = $data[22];
                $csvData->Estribor10 = $data[23];
                $csvData->Estribor2 = $data[24];
                $csvData->Estribor3 = $data[25];
                $csvData->Estribor4 = $data[26];
                $csvData->Estribor5 = $data[27];
                $csvData->Estribor6 = $data[28];
                $csvData->Estribor7 = $data[29];
                $csvData->Estribor8 = $data[30];
                $csvData->Estribor9 = $data[31];
                $csvData->Horas_Total_MP = $data[32];
                $csvData->PotenciaCP = $data[33];
                $csvData->PotenciaCT1 = $data[34];
                $csvData->PotenciaCT2 = $data[35];
                $csvData->PotenciaCT3 = $data[36];
                $csvData->PotenciaCT4 = $data[37];
                $csvData->PotenciaConsumida = $data[38];
                $csvData->PotenciaG1 = $data[39];
                $csvData->PotenciaG2 = $data[40];
                $csvData->PotenciaG3 = $data[41];
                $csvData->PotenciaGEN = $data[42];
                $csvData->PresionAceiteMP = $data[43];
                $csvData->PresionAspiracionCP1 = $data[44];
                $csvData->PresionAspiracionCT1 = $data[45];
                $csvData->PresionAspiracionCT2 = $data[46];
                $csvData->PresionAspiracionCT3 = $data[47];
                $csvData->PresionAspiracionCT4 = $data[48];
                $csvData->PresionDescargaCP1 = $data[49];
                $csvData->PresionDescargaCT1 = $data[50];
                $csvData->PresionDescargaCT2 = $data[51];
                $csvData->PresionDescargaCT3 = $data[52];
                $csvData->PresionDescargaCT4 = $data[53];
                $csvData->PresionG1 = $data[54];
                $csvData->PresionG2 = $data[55];
                $csvData->PresionG3 = $data[56];
                $csvData->Presion_Reductora = $data[57];
                $csvData->RPM_MP = $data[58];
                $csvData->TemperaturaADescargaCP1 = $data[59];
                $csvData->TemperaturaADescargaCT1 = $data[60];
                $csvData->TemperaturaADescargaCT2 = $data[61];
                $csvData->TemperaturaADescargaCT3 = $data[62];
                $csvData->TemperaturaADescargaCT4 = $data[63];
                $csvData->TemperaturaAceiteCT1 = $data[64];
                $csvData->TemperaturaAceiteCT2 = $data[65];
                $csvData->TemperaturaAceiteCT3 = $data[66];
                $csvData->TemperaturaAceiteCT4 = $data[67];
                $csvData->TemperaturaAceiteMP = $data[68];
                $csvData->TemperaturaAguaMP = $data[69];
                $csvData->TemperaturaAspiracionCP1 = $data[70];
                $csvData->TemperaturaAspiracionCT1 = $data[71];
                $csvData->TemperaturaAspiracionCT2 = $data[72];
                $csvData->TemperaturaAspiracionCT3 = $data[73];
                $csvData->TemperaturaAspiracionCT4 = $data[74];
                $csvData->TemperaturaG1 = $data[75];
                $csvData->TemperaturaG2 = $data[76];
                $csvData->TemperaturaG3 = $data[77];
                $csvData->Temperatura_Reductora = $data[78];
                $csvData->VoltajeG1 = $data[79];
                $csvData->VoltajeG2 = $data[80];
                $csvData->VoltajeG3 = $data[81];
                
               
                $csvData->save();
            }
            fclose($handle);
        }

        return redirect()->back()->with('success', 'Datos del CSV importados exitosamente.');
    }
}
