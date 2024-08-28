<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CsvDataResource\Pages;
use App\Filament\Resources\CsvDataResource\RelationManagers;
use App\Models\CsvData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\FileUpload;

use League\Csv\Reader;

class CsvDataResource extends Resource
{
    protected static ?string $model = CsvData::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Tables\Actions\Action::make('Import CSV')
                    ->label('Import CSV')
                    ->action(function (array $data): void {
                        if (isset($data['csv_file'])) {
                            $path = $data['csv_file']->store('temp');
                            $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
                            $csv->setHeaderOffset(0);

                            $records = $csv->getRecords();
                            foreach ($records as $record) {
                                CsvData::create([
                                    'TimeInt' => $record['TimeInt'],
                                    'TimeStr' => $record['TimeStr'],
                                    'AmperajeC1' => $record['AmperajeC1'],
                                    'AmperajeC2' => $record['AmperajeC2'],
                                    'AmperajeC3' => $record['AmperajeC3'],
                                    'AmperajeC4' => $record['AmperajeC4'],
                                    'AmperajeC5' => $record['AmperajeC5'],
                                    'AmperajeG1' => $record['AmperajeG1'],
                                    'AmperajeG2' => $record['AmperajeG2'],
                                    'AmperajeG3' => $record['AmperajeG3'],
                                    'Babor1' => $record['Babor1'],
                                    'Babor10' => $record['Babor10'],
                                    'Babor2' => $record['Babor2'],
                                    'Babor3' => $record['Babor3'],
                                    'Babor4' => $record['Babor4'],
                                    'Babor5' => $record['Babor5'],
                                    'Babor6' => $record['Babor6'],
                                    'Babor7' => $record['Babor7'],
                                    'Babor8' => $record['Babor8'],
                                    'Babor9' => $record['Babor9'],
                                    'Consumo_Instantaneo_MP' => $record['Consumo_Instantaneo_MP'],
                                    'Consumo_Total_MP' => $record['Consumo_Total_MP'],
                                    'Estribor1' => $record['Estribor1'],
                                    'Estribor10' => $record['Estribor10'],
                                    'Estribor2' => $record['Estribor2'],
                                    'Estribor3' => $record['Estribor3'],
                                    'Estribor4' => $record['Estribor4'],
                                    'Estribor5' => $record['Estribor5'],
                                    'Estribor6' => $record['Estribor6'],
                                    'Estribor7' => $record['Estribor7'],
                                    'Estribor8' => $record['Estribor8'],
                                    'Estribor9' => $record['Estribor9'],
                                    'Horas_Total_MP' => $record['Horas_Total_MP'],
                                    'PotenciaCP' => $record['PotenciaCP'],
                                    'PotenciaCT1' => $record['PotenciaCT1'],
                                    'PotenciaCT2' => $record['PotenciaCT2'],
                                    'PotenciaCT3' => $record['PotenciaCT3'],
                                    'PotenciaCT4' => $record['PotenciaCT4'],
                                    'PotenciaConsumida' => $record['PotenciaConsumida'],
                                    'PotenciaG1' => $record['PotenciaG1'],
                                    'PotenciaG2' => $record['PotenciaG2'],
                                    'PotenciaG3' => $record['PotenciaG3'],
                                    'PotenciaGEN' => $record['PotenciaGEN'],
                                    'PresionAceiteMP' => $record['PresionAceiteMP'],
                                    'PresionAspiracionCP1' => $record['PresionAspiracionCP1'],
                                    'PresionAspiracionCT1' => $record['PresionAspiracionCT1'],
                                    'PresionAspiracionCT2' => $record['PresionAspiracionCT2'],
                                    'PresionAspiracionCT3' => $record['PresionAspiracionCT3'],
                                    'PresionAspiracionCT4' => $record['PresionAspiracionCT4'],
                                    'PresionDescargaCP1' => $record['PresionDescargaCP1'],
                                    'PresionDescargaCT1' => $record['PresionDescargaCT1'],
                                    'PresionDescargaCT2' => $record['PresionDescargaCT2'],
                                    'PresionDescargaCT3' => $record['PresionDescargaCT3'],
                                    'PresionDescargaCT4' => $record['PresionDescargaCT4'],
                                    'PresionG1' => $record['PresionG1'],
                                    'PresionG2' => $record['PresionG2'],
                                    'PresionG3' => $record['PresionG3'],
                                    'Presion_Reductora' => $record['Presion_Reductora'],
                                    'RPM_MP' => $record['RPM_MP'],
                                    'TemperaturaADescargaCP1' => $record['TemperaturaADescargaCP1'],
                                    'TemperaturaADescargaCT1' => $record['TemperaturaADescargaCT1'],
                                    'TemperaturaADescargaCT2' => $record['TemperaturaADescargaCT2'],
                                    'TemperaturaADescargaCT3' => $record['TemperaturaADescargaCT3'],
                                    'TemperaturaADescargaCT4' => $record['TemperaturaADescargaCT4'],
                                    'TemperaturaAceiteCT1' => $record['TemperaturaAceiteCT1'],
                                    'TemperaturaAceiteCT2' => $record['TemperaturaAceiteCT2'],
                                    'TemperaturaAceiteCT3' => $record['TemperaturaAceiteCT3'],
                                    'TemperaturaAceiteCT4' => $record['TemperaturaAceiteCT4'],
                                    'TemperaturaAceiteMP' => $record['TemperaturaAceiteMP'],
                                    'TemperaturaAguaMP' => $record['TemperaturaAguaMP'],
                                    'TemperaturaAspiracionCP1' => $record['TemperaturaAspiracionCP1'],
                                    'TemperaturaAspiracionCT1' => $record['TemperaturaAspiracionCT1'],
                                    'TemperaturaAspiracionCT2' => $record['TemperaturaAspiracionCT2'],
                                    'TemperaturaAspiracionCT3' => $record['TemperaturaAspiracionCT3'],
                                    'TemperaturaAspiracionCT4' => $record['TemperaturaAspiracionCT4'],
                                    'TemperaturaG1' => $record['TemperaturaG1'],
                                    'TemperaturaG2' => $record['TemperaturaG2'],
                                    'TemperaturaG3' => $record['TemperaturaG3'],
                                    'Temperatura_Reductora' => $record['Temperatura_Reductora'],
                                    'VoltajeG1' => $record['VoltajeG1'],
                                    'VoltajeG2' => $record['VoltajeG2'],
                                    'VoltajeG3' => $record['VoltajeG3'],
                                ]);
                            }

                          
                            Storage::delete($path);
                        }
                    })
                    ->form([
                        FileUpload::make('csv_file')
                            ->label('CSV File')
                            ->required()
                            ->acceptedFileTypes(['text/csv', 'text/plain'])
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCsvData::route('/'),
            'create' => Pages\CreateCsvData::route('/create'),
            'edit' => Pages\EditCsvData::route('/{record}/edit'),
        ];
    }
}
