<?php
namespace App\Filament\Resources;
use Filament\Actions\DeleteBulkAction;

use App\Models\StockMovement;
use Filament\Resources\Resource;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StockMovementResource extends Resource
{
    protected static ?string $model = StockMovement::class;
    protected static string|\BackedEnum|null $navigationIcon = \Filament\Support\Icons\Heroicon::OutlinedArrowRightOnRectangle;
    
    public static function canAccess(): bool
    {
        // Only admin users can access this resource
        return Auth::user()->isAdmin();
    }
    
    public static function canCreate(): bool
    {
        return Auth::user()->isAdmin();
    }
    
    public static function canEdit(Model $record): bool
    {
        return Auth::user()->isAdmin();
    }
    
    public static function canDelete(Model $record): bool
    {
        return Auth::user()->isAdmin();
    }

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->options([
                        'in' => 'Stock In',
                        'out' => 'Stock Out',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('quantity')->numeric()->required(),
                Forms\Components\TextInput::make('reason'),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')->label('Product'),
                Tables\Columns\TextColumn::make('type')->label('Type'),
                Tables\Columns\TextColumn::make('quantity')->label('Quantity'),
                Tables\Columns\TextColumn::make('reason')->label('Reason'),
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Date'),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_id')
                    ->relationship('product', 'name')
                    ->label('Product'),
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'in' => 'Stock In',
                        'out' => 'Stock Out',
                    ])
                    ->label('Type'),
                Tables\Filters\SelectFilter::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User'),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('date')->label('Date'),
                    ])
                    ->query(function ($query, $data) {
                        if ($data['date']) {
                            $query->whereDate('created_at', $data['date']);
                        }
                    })
                    ->label('Date'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\StockMovementResource\Pages\ListStockMovements::route('/'),
            'create' => \App\Filament\Resources\StockMovementResource\Pages\CreateStockMovement::route('/create'),
            'edit' => \App\Filament\Resources\StockMovementResource\Pages\EditStockMovement::route('/{record}/edit'),
        ];
    }
}
