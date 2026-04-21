<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class CustomAccountWidget extends Widget
{
    protected static ?int $sort = -3;
    
    protected static bool $isLazy = false;
    
    protected int | string | array $columnSpan = 'full';
    
    // This widget should be visible to all users
    public static function canView(): bool
    {
        return auth()->check(); // Only requirement is being logged in
    }

    /**
     * @var view-string
     */
    protected string $view = 'filament.widgets.custom-account-widget';
}