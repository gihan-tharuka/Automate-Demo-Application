<?php

namespace App\Filament\Resources;
use Filament\Actions\DeleteBulkAction;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static string|\BackedEnum|null $navigationIcon = \Filament\Support\Icons\Heroicon::OutlinedCube;

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
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('part_number')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\Textarea::make('description'),
                Forms\Components\TextInput::make('quantity')->numeric()->required(),
                Forms\Components\TextInput::make('buying_price')->numeric()->required(),
                Forms\Components\TextInput::make('selling_price')->numeric()->required(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),

                Forms\Components\TextInput::make('vehicle_make')
                    ->label('Vehicle Make')
                    ->placeholder('e.g., Toyota, Honda, BMW')
                    ->helperText('Optional: Specify compatible vehicle make'),

                Forms\Components\TextInput::make('vehicle_model')
                    ->label('Vehicle Model')
                    ->placeholder('e.g., Corolla, Civic, X5')
                    ->helperText('Optional: Specify compatible vehicle model'),

                Forms\Components\TextInput::make('vehicle_year')
                    ->label('Vehicle Year')
                    ->placeholder('e.g., 2020, 2018-2022')
                    ->helperText('Optional: Specify compatible vehicle year'),

                FileUpload::make('image')
                    ->image()
                    ->directory('team-members')
                    ->imageEditor()
                    ->disk(config('filesystems.default'))
                    ->visibility('public')
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('800')
                    ->imageResizeMode('cover')
                    ->maxSize(10240)
                    ->helperText('Upload any size image - it will be automatically optimized and compressed. Recommended dimensions: 800x800px'),
            ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('part_number')->searchable(),
                Tables\Columns\TextColumn::make('vehicle_make')
                    ->label('Make')
                    ->searchable()
                    ->toggleable()
                    ->placeholder('-'),
                Tables\Columns\TextColumn::make('vehicle_model')
                    ->label('Model')
                    ->searchable()
                    ->toggleable()
                    ->placeholder('-'),
                Tables\Columns\TextColumn::make('vehicle_year')
                    ->label('Year')
                    ->searchable()
                    ->toggleable()
                    ->placeholder('-'),
                Tables\Columns\TextColumn::make('quantity')
                    ->sortable()
                    ->badge(fn ($record) => $record->isLowStock() ? 'Low Stock' : null)
                    ->color(fn ($record) => $record->isLowStock() ? 'danger' : 'success'),
                Tables\Columns\TextColumn::make('buying_price')->money('LKR'),
                Tables\Columns\TextColumn::make('selling_price')->money('LKR'),
                Tables\Columns\TextColumn::make('category.name')->label('Category'),

            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ])
            ->filters([
                Tables\Filters\Filter::make('inventory_valuation')
                    ->form([
                        Forms\Components\TextInput::make('min_value')->numeric()->label('Min Value'),
                        Forms\Components\TextInput::make('max_value')->numeric()->label('Max Value'),
                    ])
                    ->query(function ($query, $data) {
                        if ($data['min_value']) {
                            $query->whereRaw('(buying_price * quantity) >= ?', [$data['min_value']]);
                        }
                        if ($data['max_value']) {
                            $query->whereRaw('(buying_price * quantity) <= ?', [$data['max_value']]);
                        }
                    })
                    ->label('Inventory Valuation'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\ProductResource\Pages\ListProducts::route('/'),
            'create' => \App\Filament\Resources\ProductResource\Pages\CreateProduct::route('/create'),
            'edit' => \App\Filament\Resources\ProductResource\Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
