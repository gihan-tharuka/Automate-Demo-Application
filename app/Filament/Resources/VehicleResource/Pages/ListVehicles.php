<?php

namespace App\Filament\Resources\VehicleResource\Pages;

use App\Filament\Resources\VehicleResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListVehicles extends ListRecords
{
    protected static string $resource = VehicleResource::class;
    
    protected function getHeaderActions(): array
    {
        // Only show create action to admin users
        if (auth()->user() && auth()->user()->isAdmin()) {
            return [
                Actions\CreateAction::make(),
            ];
        }
        
        return [];
    }

    protected function getTableActions(): array
    {
        $actions = [
            Actions\ViewAction::make(),
        ];
        
        // Only show edit and delete actions to admin users
        if (auth()->user() && auth()->user()->isAdmin()) {
            $actions[] = Actions\EditAction::make();
            $actions[] = Actions\DeleteAction::make();
        }
        
        return $actions;
    }
}
