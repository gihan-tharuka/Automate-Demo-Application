<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use Illuminate\Support\Facades\Schema;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema as FormSchema;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Financial Tracker';

    protected static ?int $navigationSort = 1;

    public static function form(FormSchema $schema): FormSchema
    {
        return $schema
            ->components([
                Section::make('Transaction Details')
                    ->components([
                        Grid::make(2)
                            ->components([
                                Forms\Components\Select::make('type')
                                    ->label('Type')
                                    ->options([
                                        'income' => 'Income',
                                        'expense' => 'Expense',
                                    ])
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('category', null)),

                                Forms\Components\TextInput::make('amount')
                                    ->label('Amount (LKR)')
                                    ->numeric()
                                    ->required()
                                    ->prefix('LKR')
                                    ->step('0.01')
                                    ->minValue(0.01),

                                Forms\Components\DatePicker::make('date')
                                    ->label('Date')
                                    ->required()
                                    ->default(now()),

                                Forms\Components\Select::make('category')
                                    ->label('Category')
                                    ->required()
                                    ->options(function (callable $get) {
                                        $type = $get('type');

                                        if ($type === 'income') {
                                            return [
                                                'Service Revenue' => 'Service Revenue',
                                                'Parts Sales' => 'Parts Sales',
                                                'Mixed (Parts & Service)' => 'Mixed (Parts & Service)',
                                                'Miscellaneous' => 'Miscellaneous',
                                                'Refund Received' => 'Refund Received',
                                                'Other' => 'Other',
                                            ];
                                        }

                                        return [
                                            'Inventory/Stock Purchases' => 'Inventory/Stock Purchases',
                                            'Operating Expenses' => 'Operating Expenses',
                                            'Rent' => 'Rent',
                                            'Utilities' => 'Utilities',
                                            'Salaries & Wages' => 'Salaries & Wages',
                                            'Equipment & Tools' => 'Equipment & Tools',
                                            'Vehicle Expenses' => 'Vehicle Expenses',
                                            'Marketing & Advertising' => 'Marketing & Advertising',
                                            'Administrative Costs' => 'Administrative Costs',
                                            'Maintenance & Repairs' => 'Maintenance & Repairs',
                                            'Miscellaneous' => 'Miscellaneous',
                                        ];
                                    }),

                                Forms\Components\Select::make('payment_method')
                                    ->label('Payment Method')
                                    ->options([
                                        'Cash' => 'Cash',
                                        'Card' => 'Card',
                                        'Bank Transfer' => 'Bank Transfer',
                                        'Other' => 'Other',
                                    ]),

                                Forms\Components\TextInput::make('reference_number')
                                    ->label('Receipt/Invoice #')
                                    ->maxLength(255),
                            ]),

                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->rows(3)
                            ->maxLength(1000),
                    ]),
            ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date('M d, Y')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'success' => 'income',
                        'danger' => 'expense',
                    ])
                    ->icons([
                        'heroicon-o-arrow-trending-up' => 'income',
                        'heroicon-o-arrow-trending-down' => 'expense',
                    ])
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),

                Tables\Columns\TextColumn::make('category')
                    ->searchable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('amount')
                    ->money('LKR')
                    ->sortable()
                    ->color(fn (Transaction $record): string => $record->isIncome() ? 'success' : 'danger')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('payment_method')
                    ->badge()
                    ->color('gray')
                    ->default('—'),

                Tables\Columns\TextColumn::make('reference_number')
                    ->label('Ref #')
                    ->searchable()
                    ->default('—'),

                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Created By')
                    ->default('—'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'income' => 'Income',
                        'expense' => 'Expense',
                    ]),

                Tables\Filters\SelectFilter::make('category')
                    ->options(function () {
                        return Transaction::query()
                            ->distinct()
                            ->pluck('category', 'category')
                            ->toArray();
                    }),

                Tables\Filters\Filter::make('date')
                    ->form([
                        Forms\Components\DatePicker::make('from'),
                        Forms\Components\DatePicker::make('until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                            );
                    }),
            ])
            ->defaultSort('date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
            'view' => Pages\ViewTransaction::route('/{record}'),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()
            && auth()->user()->isAdmin()
            && Schema::hasTable((new Transaction)->getTable());
    }
}
