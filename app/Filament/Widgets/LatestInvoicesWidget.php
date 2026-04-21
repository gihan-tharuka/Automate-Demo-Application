<?php

namespace App\Filament\Widgets;

use App\Models\Invoice;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestInvoicesWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    
    protected int | string | array $columnSpan = 'full';
    
    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Invoice::query()
                    ->latest('date')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vehicle_number')
                    ->label('Vehicle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->money('LKR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'overdue' => 'danger',
                        'pending' => 'warning',
                        'paid' => 'success',
                        default => 'gray',
                    }),
            ])
            ->heading('Recent Invoices');
    }
}