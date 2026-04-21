<?php

namespace App\Filament\Widgets;

use App\Models\Income;
use App\Models\Expense;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class IncomeVsExpenseChartWidget extends ChartWidget
{
    protected ?string $heading = 'Income vs Expenses (Last 6 Months)';
    protected static ?int $sort = 3;
    protected ?string $pollingInterval = '60s';

    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    protected function getData(): array
    {
        $incomeData = [];
        $expenseData = [];
        $profitData = [];
        $labels = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $labels[] = $month->format('M Y');

            $startOfMonth = $month->copy()->startOfMonth();
            $endOfMonth = $month->copy()->endOfMonth();

            $monthlyIncome = Income::whereBetween('date', [$startOfMonth, $endOfMonth])->sum('amount');
            $monthlyExpense = Expense::whereBetween('date', [$startOfMonth, $endOfMonth])->sum('amount');
            $monthlyProfit = $monthlyIncome - $monthlyExpense;

            $incomeData[] = (float) $monthlyIncome;
            $expenseData[] = (float) $monthlyExpense;
            $profitData[] = (float) $monthlyProfit;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Income',
                    'data' => $incomeData,
                    'backgroundColor' => 'rgba(34, 197, 94, 0.2)',
                    'borderColor' => 'rgb(34, 197, 94)',
                    'borderWidth' => 2,
                ],
                [
                    'label' => 'Expenses',
                    'data' => $expenseData,
                    'backgroundColor' => 'rgba(239, 68, 68, 0.2)',
                    'borderColor' => 'rgb(239, 68, 68)',
                    'borderWidth' => 2,
                ],
                [
                    'label' => 'Profit',
                    'data' => $profitData,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'borderWidth' => 2,
                    'type' => 'line',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'callback' => 'function(value) { return "LKR " + value.toLocaleString(); }',
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) { return context.dataset.label + ": LKR " + context.parsed.y.toLocaleString(); }',
                    ],
                ],
            ],
        ];
    }
}
