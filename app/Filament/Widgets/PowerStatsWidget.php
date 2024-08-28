<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Forms\Components\DatePicker;
use App\Models\CsvData;

class PowerStatsWidget extends ChartWidget
{
    protected static ?string $heading = 'Potencia G1, G2 y KW Optimo';

    protected int | string | array $columnSpan = 'full';

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {

        $csvData = CsvData::select('TimeInt', 'PotenciaG1', 'PotenciaG2')->get();

        $timeStr = $csvData->pluck('TimeInt')->toArray();

        $timeStr = array_map(function($time) {
            return date('Y-m-d', $time);
        }, $timeStr);

        $kwOptimo = array_fill(0, count($timeStr), 500); 

        return [
            'datasets' => [
                [
                    'label' => 'Potencia G1',
                    'data' => $csvData->pluck('PotenciaG1')->toArray(),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                ],
                [
                    'label' => 'Potencia G2',
                    'data' => $csvData->pluck('PotenciaG2')->toArray(),
                    'borderColor' => 'rgba(153, 102, 255, 1)',
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                ],
                [
                    'label' => 'KW Optimo',
                    'data' => $kwOptimo,
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderDash' => [5, 5],
                ],
            ],
            'labels' => $timeStr,
        ];
    }
}
