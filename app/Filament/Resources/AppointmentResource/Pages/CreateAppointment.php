<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    protected static string $resource = AppointmentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Auto-fill customer details from user if not provided
        if (!empty($data['user_id'])) {
            $user = \App\Models\User::find($data['user_id']);
            if ($user) {
                $data['customer_name'] = $data['customer_name'] ?? $user->name;
                $data['customer_email'] = $data['customer_email'] ?? $user->email;
            }
        }
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
