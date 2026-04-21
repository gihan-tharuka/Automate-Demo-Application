<?php

namespace App\Filament\Widgets;

use App\Models\Invoice;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RepairServiceTrendsWidget extends ChartWidget
{
    protected ?string $heading = 'Monthly Repair Services';
    
    protected static ?int $sort = 5;
    
    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }
    
    protected function getData(): array
    {
        // Get the last 6 months data
        $data = [];
        $labels = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $labels[] = $month->format('M Y');
            
            $monthlyInvoices = Invoice::whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->count();
                
            $data[] = $monthlyInvoices;
        }
        
        return [
            'datasets' => [
                [
                    'label' => 'Repair Services',
                    'data' => $data,
                    'fill' => false,
                    'borderColor' => '#4BC0C0',
                    'tension' => 0.1
                ]
            ],
            'labels' => $labels
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}