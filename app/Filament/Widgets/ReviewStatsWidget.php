<?php

namespace App\Filament\Widgets;

use App\Models\Review;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ReviewStatsWidget extends BaseWidget
{
    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        $totalReviews = Review::count();
        $pendingReviews = Review::where('status', 'pending')->count();
        $averageRating = Review::where('status', 'approved')->avg('rating');
        $featuredCount = Review::where('is_featured', true)->count();

        // Calculate rating distribution
        $fiveStarCount = Review::where('status', 'approved')->where('rating', 5)->count();
        $fiveStarPercentage = $totalReviews > 0 ? round(($fiveStarCount / $totalReviews) * 100) : 0;

        return [
            Stat::make('Total Reviews', $totalReviews)
                ->description('All time reviews')
                ->descriptionIcon('heroicon-m-star')
                ->color('success'),

            Stat::make('Pending Review', $pendingReviews)
                ->description('Awaiting approval')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Average Rating', number_format($averageRating, 1) . ' / 5.0')
                ->description($fiveStarPercentage . '% are 5-star reviews')
                ->descriptionIcon('heroicon-m-star')
                ->color('success'),

            Stat::make('Featured Testimonials', $featuredCount)
                ->description('Shown on website')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('info'),
        ];
    }
}
