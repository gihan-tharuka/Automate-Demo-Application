<?php

namespace App\Filament\Resources\VehicleResource\Pages;

use App\Filament\Resources\VehicleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVehicle extends CreateRecord
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

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth()->user();
        // If admin, user_id comes from form. If customer, set to own id.
        if (!($user && method_exists($user, 'isAdmin') && $user->isAdmin())) {
            $data['user_id'] = $user->id;
        }
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
