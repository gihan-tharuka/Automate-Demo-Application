<?php

namespace App\Filament\Resources\MyReviewsResource\Pages;

use App\Filament\Resources\MyReviewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMyReview extends ViewRecord
{
    protected static string $resource = MyReviewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Back to My Reviews')
                ->url(MyReviewsResource::getUrl('index'))
                ->color('gray'),
        ];
    }
}
