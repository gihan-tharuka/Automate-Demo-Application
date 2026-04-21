<?php

namespace App\Filament\Resources\MyReviewsResource\Pages;

use App\Filament\Resources\MyReviewsResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;

class ListMyReviews extends ListRecords
{
    protected static string $resource = MyReviewsResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function getTabs(): array
    {
        $userId = auth()->id();

        return [
            'all' => Tab::make('All Reviews')
                ->badge(fn () => \App\Models\Review::where('user_id', $userId)->count()),

            'approved' => Tab::make('Approved')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'approved'))
                ->badge(fn () => \App\Models\Review::where('user_id', $userId)->where('status', 'approved')->count()),

            'pending' => Tab::make('Pending')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'pending'))
                ->badge(fn () => \App\Models\Review::where('user_id', $userId)->where('status', 'pending')->count()),
        ];
    }
}
