<?php

namespace App\Filament\Resources\Messages\Schemas;

use Filament\Schemas\Schema;

class MessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')->required(),
                \Filament\Forms\Components\TextInput::make('email')->email()->required(),
                \Filament\Forms\Components\TextInput::make('phone'),
                \Filament\Forms\Components\TextInput::make('service'),
                \Filament\Forms\Components\Textarea::make('message')->required(),
            ]);
    }
}
