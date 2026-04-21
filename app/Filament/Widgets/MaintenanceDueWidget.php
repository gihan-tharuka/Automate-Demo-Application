<?php

namespace App\Filament\Widgets;

use App\Models\Vehicle;
use Carbon\Carbon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class MaintenanceDueWidget extends BaseWidget
{
    protected static ?int $sort = 6;
    
    protected int | string | array $columnSpan = 'full';
    
    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function table(Table $table): Table
    {
        // Calculate vehicles that might need maintenance based on mileage
        // In a real app, you would have a maintenance schedule table
        // This is a simplified example using just mileage as an indicator
        
        return $table
            ->query(
                Vehicle::query()
                    ->where('mileage', '>', 5000)
                    ->orderBy('mileage', 'desc')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('make')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('license_plate')
                    ->label('License Plate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mileage')
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string => number_format($state) . ' km'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Owner')
                    ->searchable(),
            ])
            ->heading('Vehicles Due for Maintenance');
    }
}