<?php

namespace App\Filament\Widgets;

use App\Models\Vehicle;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\DB;

class VehicleTypeDistributionWidget extends ChartWidget
{
    protected ?string $heading = 'Vehicle Makes Distribution';
    
    protected static ?int $sort = 4;
    
    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }
    
    protected function getData(): array
    {
        $vehicles = Vehicle::select('make', DB::raw('count(*) as count'))
            ->groupBy('make')
            ->orderBy('count', 'desc')
            ->limit(6)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Vehicles by Make',
                    'data' => $vehicles->pluck('count')->toArray(),
                    'backgroundColor' => [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'
                    ],
                    'borderColor' => '#ffffff',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $vehicles->pluck('make')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}