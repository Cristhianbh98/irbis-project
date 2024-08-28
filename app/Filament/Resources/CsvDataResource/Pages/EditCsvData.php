<?php

namespace App\Filament\Resources\CsvDataResource\Pages;

use App\Filament\Resources\CsvDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCsvData extends EditRecord
{
    protected static string $resource = CsvDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
