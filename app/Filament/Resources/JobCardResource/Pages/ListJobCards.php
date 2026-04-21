<?php

namespace App\Filament\Resources\JobCardResource\Pages;

use App\Filament\Resources\JobCardResource;
use Filament\Resources\Pages\ListRecords;

class ListJobCards extends ListRecords
{
    protected static string $resource = JobCardResource::class;
    protected function getHeaderActions(): array
    {
        // Only show create action to admin users
        if (auth()->user() && auth()->user()->isAdmin()) {
            return [
                \Filament\Actions\CreateAction::make(),
            ];
        }
        return [];
    }
    protected function getTableActions(): array
    {
        $actions = [
            \Filament\Actions\ViewAction::make(),
        ];
        // Only show edit and delete actions to admin users
        if (auth()->user() && auth()->user()->isAdmin()) {
            $actions[] = \Filament\Actions\EditAction::make();
            $actions[] = \Filament\Actions\DeleteAction::make();
        }
        return $actions;
    }
}
