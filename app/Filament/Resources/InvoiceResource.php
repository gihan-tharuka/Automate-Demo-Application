<?php

namespace App\Filament\Resources;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\Action;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Models\Invoice;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;

class InvoiceResource extends Resource
{
    public static function canAccess(): bool
    {
        return auth()->user() && 
            (
                (method_exists(auth()->user(), 'isAdmin') && auth()->user()->isAdmin()) ||
                (method_exists(auth()->user(), 'isCustomer') && auth()->user()->isCustomer())
            );
    }
    protected static ?string $model = Invoice::class;
    protected static string|\BackedEnum|null $navigationIcon = \Filament\Support\Icons\Heroicon::OutlinedDocumentText;
    protected static ?string $navigationLabel = 'Invoices';
    protected static ?string $modelLabel = 'Invoice';
    
    public static function getNavigationLabel(): string 
    {
        return auth()->user()->isCustomer() ? 'My Invoices' : 'Invoices';
    }

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema->components([
            Forms\Components\Select::make('vehicle_number')
                ->label('Vehicle Number Plate')
                ->searchable()
                ->options(fn () => \App\Models\Vehicle::pluck('license_plate', 'license_plate'))
                ->required()
                ->reactive(),
            Forms\Components\TextInput::make('mileage')
                ->label('Mileage')
                ->numeric()
                ->minValue(0)
                ->required(),
            Forms\Components\DatePicker::make('date')
                ->required()
                ->default(now()),
            Forms\Components\Select::make('payment_method')
                ->label('Payment Method')
                ->options([
                    'Cash' => 'Cash',
                    'Card' => 'Card',
                    'Bank Transfer' => 'Bank Transfer',
                    'Other' => 'Other',
                ])
                ->required(),
            Forms\Components\Textarea::make('notes')->label('Notes'),
            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'draft' => 'Draft',
                    'pending' => 'Pending',
                    'paid' => 'Paid',
                    'cancelled' => 'Cancelled',
                ])
                ->default('draft')
                ->required(),
            Forms\Components\Hidden::make('subtotal')->default(0),
            Forms\Components\Hidden::make('vat_amount')->default(0),
            Forms\Components\Hidden::make('total')->default(0),
            Forms\Components\Repeater::make('items')
                ->relationship()
                ->schema([
                    Forms\Components\Select::make('type')
                        ->options(['part' => 'Part', 'service' => 'Service'])
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            if ($state === 'service') {
                                // Set initial price only if it's null
                                if ($get('price') === null) {
                                    $set('price', 0);
                                }
                                
                                // Only calculate total if we have valid quantity and price
                                $quantity = $get('quantity') ?? 0;
                                $price = $get('price') ?? 0;
                                if ($quantity !== null && $price !== null) {
                                    $set('total', $price * $quantity);
                                }
                            }
                        }),
                    Forms\Components\Select::make('product_id')
                        ->label('Part')
                        ->options(fn () => \App\Models\Product::pluck('name', 'id'))
                        ->searchable()
                        ->visible(fn ($get) => $get('type') === 'part')
                        ->required(fn ($get) => $get('type') === 'part')
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            if ($get('type') === 'part' && $state) {
                                $product = \App\Models\Product::find($state);
                                $set('price', $product ? $product->selling_price : 0);
                                $quantity = $get('quantity') ?? 0;
                                $set('total', $product ? $product->selling_price * $quantity : 0);
                            }
                        }),
                    Forms\Components\TextInput::make('service_name')
                        ->label('Service Name')
                        ->visible(fn ($get) => $get('type') === 'service')
                        ->required(fn ($get) => $get('type') === 'service')
                        ->reactive()
                        ->live(onBlur: true) // Only update when focus leaves the field
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            if ($get('type') === 'service' && $get('price') === null) {
                                // Only set default price when it's null, don't override existing values
                                $set('price', 0);
                            }
                        }),
                    Forms\Components\TextInput::make('quantity')
                        ->numeric()
                        ->default(0)
                        ->required()
                        ->debounce('300ms') // Add debounce to wait until typing is complete
                        ->reactive()
                        ->live(onBlur: true) // Only update when focus leaves the field
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            if ($get('type') === 'part' && $get('product_id')) {
                                $product = \App\Models\Product::find($get('product_id'));
                                $set('total', $product ? $product->selling_price * $state : 0);
                            } else if ($get('type') === 'service') {
                                // Get the current price value without modifying it
                                $price = $get('price') ?? 0;
                                $quantity = $state ?? 0;
                                
                                // Only update if we have valid quantity and price
                                if ($state !== null && $state !== '' && $price !== null) {
                                    $set('total', $price * $quantity);
                                }
                            }
                        }),
                    Forms\Components\TextInput::make('price')
                        ->numeric()
                        ->required()
                        ->visible(fn ($get) => $get('type') === 'service')
                        ->debounce('300ms') // Add debounce to wait until typing is complete
                        ->reactive()
                        ->live(onBlur: true) // Only update when focus leaves the field
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            if ($get('type') === 'service') {
                                $quantity = $get('quantity') ?? 0;
                                $price = $state ?? 0; // Use the entered price value
                                
                                // Don't recalculate if price is empty or null (user still typing)
                                if ($state !== null && $state !== '') {
                                    $set('total', $price * $quantity);
                                }
                            }
                        }),
                    Forms\Components\TextInput::make('total')
                        ->numeric()
                        ->required()
                        ->disabled(),
                ])
                ->label('Invoice Items'),
        ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        $columns = [
            Tables\Columns\TextColumn::make('id')->label('Invoice #'),
            Tables\Columns\TextColumn::make('vehicle_number')->searchable(),
            Tables\Columns\TextColumn::make('total')->money('LKR'),
            Tables\Columns\TextColumn::make('date')->date(),
            Tables\Columns\TextColumn::make('status')
                ->formatStateUsing(fn (string $state): string => ucfirst($state))
                ->color(fn (string $state): string => match ($state) {
                    'draft' => 'warning',
                    'pending' => 'primary',
                    'paid' => 'success',
                    'cancelled' => 'danger',
                    default => 'gray',
                }),
        ];
        
        // Add customer name column for admin users only
        if (auth()->user() && auth()->user()->isAdmin()) {
            // Insert at position 2 (after vehicle_number)
            array_splice($columns, 2, 0, [
                Tables\Columns\TextColumn::make('user.name')->label('Customer')
            ]);
        }
        
        return $table->columns($columns)
            ->bulkActions([
                DeleteBulkAction::make(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Customer')
                    ->visible(fn() => auth()->user() && auth()->user()->isAdmin()),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'cancelled' => 'Cancelled',
                    ]),
                Tables\Filters\Filter::make('vehicle_number')
                    ->form([
                        Forms\Components\TextInput::make('vehicle_number'),
                    ])
                    ->query(fn ($query, $data) => $data['vehicle_number'] ? $query->where('vehicle_number', $data['vehicle_number']) : $query),
                Tables\Filters\Filter::make('date')
                    ->form([
                        Forms\Components\DatePicker::make('date'),
                    ])
                    ->query(fn ($query, $data) => $data['date'] ? $query->whereDate('date', $data['date']) : $query),
            ])
            ->modifyQueryUsing(function (\Illuminate\Database\Eloquent\Builder $query) {
                $user = auth()->user();
                // Admin can see all invoices
                if ($user && method_exists($user, 'isAdmin') && $user->isAdmin()) {
                    return $query;
                }
                
                // Non-admin users can only see their own invoices
                return $query->where('user_id', $user->id);
            });
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
