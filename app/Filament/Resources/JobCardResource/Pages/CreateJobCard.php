<?php

namespace App\Filament\Resources\JobCardResource\Pages;

use App\Filament\Resources\JobCardResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJobCard extends CreateRecord
{
    protected static string $resource = JobCardResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Find the vehicle and set the customer_id from its user_id
        $vehicle = \App\Models\Vehicle::find($data['vehicle_id'] ?? null);
        if ($vehicle) {
            $data['customer_id'] = $vehicle->user_id;
        }
        return $data;
    }
    protected function getRedirectUrl(): string
    {
        return JobCardResource::getUrl('index');
    }
}
