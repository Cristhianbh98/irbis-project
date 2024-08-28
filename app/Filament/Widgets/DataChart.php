<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Filament\Forms\Components\DatePicker;
use App\Models\CsvData;

class DataChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'dataChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Potencia G1, G2 y KW Optimo';

    protected int | string | array $columnSpan = 'full';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $csvData = CsvData::select('TimeInt', 'PotenciaG1', 'PotenciaG2')
            ->where('TimeInt', '>=', strtotime($this->filterFormData['date_start']))
            ->where('TimeInt', '<=', strtotime($this->filterFormData['date_end']))
            ->get();

        $timeStr = $csvData->pluck('TimeInt')->toArray();

        $timeStr = array_map(function($time) {
            return date('Y-m-d', $time);
        }, $timeStr);

        $kwOptimo = array_fill(0, count($timeStr), 500); 

        return [
            'chart' => [
                'type' => 'line',
                'height' => 400,
            ],
            'series' => [
                [
                    'name' => 'KW Optimo',
                    'data' => $kwOptimo,
                ],
                [
                    'name' => 'Potencia G1',
                    'data' => $csvData->pluck('PotenciaG1')->toArray(),
                ],
                [
                    'name' => 'Potencia G2',
                    'data' => $csvData->pluck('PotenciaG2')->toArray(),
                ],
            ],
            'xaxis' => [
                'categories' => $timeStr,
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#0000FF', '#9966FF', '#FF6384'],
            'stroke' => [
                'curve' => 'smooth',
            ],
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            DatePicker::make('date_start')
                ->default('09/02/2023'),
            DatePicker::make('date_end')
                ->default('09/08/2023'),
        ];
    }
}
