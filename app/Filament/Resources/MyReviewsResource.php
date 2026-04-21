<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MyReviewsResource\Pages;
use App\Models\Review;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class MyReviewsResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static string|\BackedEnum|null $navigationIcon = \Filament\Support\Icons\Heroicon::OutlinedStar;

    protected static ?string $navigationLabel = 'My Reviews';

    protected static ?int $navigationSort = 2;

    public static function canAccess(): bool
    {
        return auth()->user() && auth()->user()->isCustomer();
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc');
    }

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('customer_name')
                ->label('Name')
                ->disabled(),

            Forms\Components\TextInput::make('rating')
                ->label('Rating')
                ->disabled()
                ->suffix('stars'),

            Forms\Components\Textarea::make('comment')
                ->label('Your Review')
                ->disabled()
                ->rows(4)
                ->columnSpanFull(),

            Forms\Components\TextInput::make('service_used')
                ->label('Service')
                ->disabled(),

            Forms\Components\TextInput::make('status')
                ->disabled(),

            Forms\Components\Textarea::make('admin_response')
                ->label('Our Response')
                ->disabled()
                ->rows(3)
                ->columnSpanFull()
                ->visible(fn ($record) => !empty($record?->admin_response)),

            Forms\Components\Placeholder::make('created_at')
                ->label('Submitted On')
                ->content(fn ($record) => $record?->created_at?->format('F j, Y g:i A')),
        ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('service_used')
                ->label('Service')
                ->badge()
                ->color('info')
                ->searchable(),

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
                ->label('Your Review')
                ->limit(60)
                ->searchable()
                ->wrap(),

            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'approved' => 'success',
                    'rejected' => 'danger',
                    'pending' => 'warning',
                })
                ->sortable(),

            Tables\Columns\IconColumn::make('admin_response')
                ->label('Response')
                ->boolean()
                ->trueIcon('heroicon-o-chat-bubble-left-right')
                ->falseIcon('heroicon-o-minus')
                ->tooltip(fn ($record) => $record->admin_response ? 'We responded to your review' : 'No response yet'),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Submitted')
                ->dateTime('M j, Y')
                ->sortable(),
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
        ])
        ->actions([
            \Filament\Actions\ViewAction::make(),
        ])
        ->emptyStateHeading('No reviews yet')
        ->emptyStateDescription('You haven\'t submitted any reviews yet. After your service appointment, you can leave a review.')
        ->emptyStateIcon('heroicon-o-star');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMyReviews::route('/'),
            'view' => Pages\ViewMyReview::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }
}
