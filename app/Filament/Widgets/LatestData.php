<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\CsvData;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Relations\Relation;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\Filter;

class LatestData extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                CsvData::query()->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('TimeStr'),
                Tables\Columns\TextColumn::make('PotenciaG1'),
                Tables\Columns\TextColumn::make('PotenciaG2'),
            ])
            ->filters($this->getTableFilters());
    }

    protected function getTableFilters(): array 
    {
        return [
            Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from'),
                    DatePicker::make('created_until'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            strtotime($data['created_from']),
                            fn(Builder $query, $date): Builder => $query->where('TimeInt', '>=', $date),
                        )
                        ->when(
                            strtotime($data['created_until']),
                            fn(Builder $query, $date): Builder => $query->where('TimeInt', '<=', $date),
                        );
                })
        ];
    } 
}
