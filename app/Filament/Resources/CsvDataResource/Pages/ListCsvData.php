<?php

namespace App\Filament\Resources\CsvDataResource\Pages;

use App\Filament\Resources\CsvDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCsvData extends ListRecords
{
    protected static string $resource = CsvDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
