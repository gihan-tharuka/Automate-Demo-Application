<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use App\Filament\Resources\ReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;

class ListReviews extends ListRecords
{
    protected static string $resource = ReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Reviews'),

            'pending' => Tab::make('Pending')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'pending'))
                ->badge(fn () => \App\Models\Review::where('status', 'pending')->count()),

            'approved' => Tab::make('Approved')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'approved')),

            'featured' => Tab::make('Featured Testimonials')
                ->modifyQueryUsing(fn ($query) => $query->where('is_featured', true))
                ->badge(fn () => \App\Models\Review::where('is_featured', true)->count()),
        ];
    }
}
