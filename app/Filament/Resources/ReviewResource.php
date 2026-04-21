<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Notifications\Notification;


class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static string|\BackedEnum|null $navigationIcon = \Filament\Support\Icons\Heroicon::OutlinedStar;

    protected static ?string $navigationLabel = 'Reviews';

    protected static ?int $navigationSort = 4;

    public static function canAccess(): bool
    {
        return auth()->user() && auth()->user()->isAdmin();
    }

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema->components([
            Forms\Components\Select::make('appointment_id')
                ->relationship('appointment', 'id')
                ->label('Appointment')
                ->disabled()
                ->dehydrated()
                ->helperText('Optional - Only for appointment-based reviews'),

            Forms\Components\TextInput::make('customer_name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('rating')
                ->numeric()
                ->required()
                ->minValue(1)
                ->maxValue(5)
                ->suffix('stars'),

            Forms\Components\Textarea::make('comment')
                ->required()
                ->rows(4)
                ->columnSpanFull(),

            Forms\Components\TextInput::make('service_used')
                ->maxLength(255),

            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending Review',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ])
                ->required()
                ->default('pending'),

            Forms\Components\Toggle::make('is_featured')
                ->label('Feature as Testimonial')
                ->helperText('Display this review on the public website')
                ->default(false),

            Forms\Components\Textarea::make('admin_response')
                ->label('Admin Response')
                ->helperText('Optional response to the customer (private)')
                ->rows(3)
                ->columnSpanFull(),
        ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('customer_name')
                ->label('Customer')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('appointment_id')
                ->label('Appointment')
                ->formatStateUsing(fn ($state) => $state ? "#$state" : 'General Review')
                ->badge()
                ->color(fn ($state) => $state ? 'info' : 'gray')
                ->sortable(),

            Tables\Columns\TextColumn::make('rating')
                ->badge()
                ->color(fn (int $state): string => match (true) {
                    $state >= 4 => 'success',
                    $state === 3 => 'warning',
                    default => 'danger',
                })
                ->formatStateUsing(fn ($state) => str_repeat('⭐', $state))
                ->sortable(),

            Tables\Columns\TextColumn::make('comment')
                ->limit(50)
                ->searchable(),

            Tables\Columns\TextColumn::make('service_used')
                ->label('Service')
                ->badge()
                ->searchable(),

            Tables\Columns\IconColumn::make('is_featured')
                ->label('Featured')
                ->boolean()
                ->sortable(),

            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'approved' => 'success',
                    'rejected' => 'danger',
                    'pending' => 'warning',
                })
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->defaultSort('created_at', 'desc')
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ]),

            Tables\Filters\SelectFilter::make('rating')
                ->options([
                    5 => '5 Stars',
                    4 => '4 Stars',
                    3 => '3 Stars',
                    2 => '2 Stars',
                    1 => '1 Star',
                ]),

            Tables\Filters\TernaryFilter::make('is_featured')
                ->label('Featured Testimonials'),
        ])
        ->actions([
            \Filament\Actions\Action::make('approve')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation()
                ->action(function (Review $record) {
                    $record->update(['status' => 'approved']);
                    Notification::make()
                        ->success()
                        ->title('Review Approved')
                        ->body('The review has been approved successfully.')
                        ->send();
                })
                ->visible(fn (Review $record) => $record->status !== 'approved'),

            \Filament\Actions\Action::make('reject')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->requiresConfirmation()
                ->action(function (Review $record) {
                    $record->update(['status' => 'rejected']);
                    Notification::make()
                        ->success()
                        ->title('Review Rejected')
                        ->body('The review has been rejected.')
                        ->send();
                })
                ->visible(fn (Review $record) => $record->status !== 'rejected'),

            \Filament\Actions\ViewAction::make(),
            \Filament\Actions\EditAction::make(),
            \Filament\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            \Filament\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'view' => Pages\ViewReview::route('/{record}'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('status', 'pending')->count();
        return $count > 0 ? (string)$count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}
