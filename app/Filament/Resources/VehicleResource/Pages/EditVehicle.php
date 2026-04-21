<?php

namespace App\Filament\Resources\VehicleResource\Pages;

use App\Filament\Resources\VehicleResource;
use Filament\Resources\Pages\EditRecord;

class EditVehicle extends EditRecord
{
    protected static string $resource = VehicleResource::class;
    
    protected function authorizeAccess(): void
    {
        parent::authorizeAccess();
        
        // Ensure only admin users can access this page
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
