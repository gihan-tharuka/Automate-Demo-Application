<?php

namespace App\Filament\Widgets;

use App\Models\Income;
use App\Models\Expense;
use Illuminate\Support\Facades\Schema;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class FinancialOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected ?string $pollingInterval = '60s';

    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    protected function getStats(): array
    {
        // If income/expense tables are not yet migrated, avoid breaking the dashboard.
        if (! Schema::hasTable('incomes') || ! Schema::hasTable('expenses')) {
            return [
                Stat::make('Monthly Income', 'LKR 0.00')
                    ->description('Awaiting migrations')
                    ->color('gray'),
                Stat::make('Monthly Expenses', 'LKR 0.00')
                    ->description('Awaiting migrations')
                    ->color('gray'),
                Stat::make('Monthly Profit', 'LKR 0.00')
                    ->description('0.0% profit margin')
                    ->color('gray'),
                Stat::make('Yearly Profit', 'LKR 0.00')
                    ->description('Awaiting migrations')
                    ->color('gray'),
            ];
        }

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        // Monthly calculations based on separate incomes & expenses tables
        $monthlyIncome = Income::whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount');
        $monthlyExpense = Expense::whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount');
        $monthlyProfit = $monthlyIncome - $monthlyExpense;

        // Yearly calculations based on separate incomes & expenses tables
        $yearlyIncome = Income::whereBetween('date', [$startOfYear, $endOfYear])
            ->sum('amount');
        $yearlyExpense = Expense::whereBetween('date', [$startOfYear, $endOfYear])
            ->sum('amount');
        $yearlyProfit = $yearlyIncome - $yearlyExpense;

        // Profit margin calculation
        $profitMargin = $monthlyIncome > 0 ? ($monthlyProfit / $monthlyIncome) * 100 : 0;

        return [
            Stat::make('Monthly Income', 'LKR ' . number_format($monthlyIncome, 2))
                ->description('Total income this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Monthly Expenses', 'LKR ' . number_format($monthlyExpense, 2))
                ->description('Total expenses this month')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),

            Stat::make('Monthly Profit', 'LKR ' . number_format($monthlyProfit, 2))
                ->description(sprintf('%.1f%% profit margin', $profitMargin))
                ->descriptionIcon($monthlyProfit >= 0 ? 'heroicon-m-check-circle' : 'heroicon-m-x-circle')
                ->color($monthlyProfit >= 0 ? 'success' : 'danger'),

            Stat::make('Yearly Profit', 'LKR ' . number_format($yearlyProfit, 2))
                ->description('Total profit this year')
                ->descriptionIcon($yearlyProfit >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($yearlyProfit >= 0 ? 'success' : 'warning'),
        ];
    }
}
