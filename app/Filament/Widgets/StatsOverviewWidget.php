<?php

namespace App\Filament\Widgets;

use App\Models\Invoice;
use App\Models\StockMovement;
use App\Models\Vehicle;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class StatsOverviewWidget extends BaseWidget
{
    protected ?string $pollingInterval = '60s';
    
    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    protected function getStats(): array
    {
        // Calculate monthly revenue (current month)
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        
        $monthlyRevenue = Invoice::where('status', 'paid')
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('total');
            
        // Get pending invoice count
        $pendingInvoices = Invoice::where('status', 'pending')->count();
        
        // Total vehicles in the system
        $totalVehicles = Vehicle::count();

        return [
            Stat::make('Total Vehicles', $totalVehicles)
                ->description('All registered vehicles')
                ->descriptionIcon('heroicon-m-truck')
                ->chart([7, 3, 4, 5, 6, $totalVehicles])
                ->color('success'),

            Stat::make('Pending Invoices', $pendingInvoices)
                ->description('Awaiting payment')
                ->descriptionIcon('heroicon-m-document-text')
                ->color($pendingInvoices > 10 ? 'danger' : 'warning'),

            Stat::make('Monthly Revenue', 'LKR ' . number_format($monthlyRevenue, 2))
                ->description('This month')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->chart([15, 4, 10, 2, 12, round($monthlyRevenue/100)])
                ->color('success'),
        ];
    }
}