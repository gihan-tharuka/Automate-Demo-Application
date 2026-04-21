<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Transactions'),
            'income' => Tab::make('Income')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'income'))
                ->badge(fn () => \App\Models\Transaction::where('type', 'income')->count()),
            'expense' => Tab::make('Expenses')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'expense'))
                ->badge(fn () => \App\Models\Transaction::where('type', 'expense')->count()),
            'today' => Tab::make('Today')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereDate('date', today()))
                ->badge(fn () => \App\Models\Transaction::whereDate('date', today())->count()),
            'this_month' => Tab::make('This Month')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereBetween('date', [now()->startOfMonth(), now()->endOfMonth()]))
                ->badge(fn () => \App\Models\Transaction::whereBetween('date', [now()->startOfMonth(), now()->endOfMonth()])->count()),
        ];
    }
}
