<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;
    
    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getTableQuery();
        
        // If not admin, only show user's own invoices
        if (auth()->check() && !auth()->user()->isAdmin()) {
            $query->where('user_id', auth()->id());
        }
        
        return $query;
    }

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
            \Filament\Actions\Action::make('view_receipt')
                ->label('View')
                ->icon('heroicon-o-document-text')
                ->url(fn ($record) => route('invoice.receipt', $record->id)),
        ];
        
        // Only show edit and delete actions to admin users
        if (auth()->user() && auth()->user()->isAdmin()) {
            $actions[] = \Filament\Actions\EditAction::make();
            $actions[] = \Filament\Actions\DeleteAction::make();
        }
        
        return $actions;
    }
    
    protected function getBulkActions(): array
    {
        // Only show bulk actions to admin users
        if (auth()->user() && auth()->user()->isAdmin()) {
            return [
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                ]),
            ];
        }
        
        return [];
    }
}
