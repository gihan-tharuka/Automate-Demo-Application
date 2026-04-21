<?php

namespace App\Filament\Resources\Messages\Schemas;

use Filament\Schemas\Schema;

class MessageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Infolists\Components\TextEntry::make('name'),
                \Filament\Infolists\Components\TextEntry::make('email'),
                \Filament\Infolists\Components\TextEntry::make('phone'),
                \Filament\Infolists\Components\TextEntry::make('service'),
                \Filament\Infolists\Components\TextEntry::make('message'),
                \Filament\Infolists\Components\TextEntry::make('created_at')->dateTime(),
            ]);
    }
}
