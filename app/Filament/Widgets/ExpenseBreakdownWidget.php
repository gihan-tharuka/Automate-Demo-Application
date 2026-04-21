<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ExpenseBreakdownWidget extends ChartWidget
{
    protected ?string $heading = 'Expense Breakdown (This Month)';
    protected static ?int $sort = 4;
    protected ?string $pollingInterval = '60s';

    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    protected function getData(): array
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $expenses = Expense::select('category', DB::raw('SUM(amount) as total'))
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->groupBy('category')
            ->orderBy('total', 'desc')
            ->get();

        if ($expenses->isEmpty()) {
            return [
                'datasets' => [
                    [
                        'label' => 'No expenses this month',
                        'data' => [1],
                        'backgroundColor' => ['#e5e7eb'],
                    ],
                ],
                'labels' => ['No Data'],
            ];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Expenses by Category',
                    'data' => $expenses->pluck('total')->map(fn($val) => (float) $val)->toArray(),
                    'backgroundColor' => [
                        '#FF6384', // Red
                        '#36A2EB', // Blue
                        '#FFCE56', // Yellow
                        '#4BC0C0', // Teal
                        '#9966FF', // Purple
                        '#FF9F40', // Orange
                        '#FF6B6B', // Light Red
                        '#4ECDC4', // Light Teal
                        '#45B7D1', // Sky Blue
                        '#96CEB4', // Sage Green
                        '#FFEAA7', // Light Yellow
                    ],
                    'borderColor' => '#ffffff',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $expenses->pluck('category')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'right',
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) {
                            const label = context.label || "";
                            const value = context.parsed || 0;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((value / total) * 100).toFixed(1);
                            return label + ": LKR " + value.toLocaleString() + " (" + percentage + "%)";
                        }',
                    ],
                ],
            ],
        ];
    }
}
