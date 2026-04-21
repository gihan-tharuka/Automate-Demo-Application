<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    App\Providers\FilamentServiceProvider::class,
    App\Providers\Filament\MainPanelPanelProvider::class,
    // App\Providers\FortifyServiceProvider::class, // Removed as we're using Jetstream now
    App\Providers\JetstreamServiceProvider::class,
];
