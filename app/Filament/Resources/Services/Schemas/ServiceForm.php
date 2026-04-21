<?php

namespace App\Filament\Resources\Services\Schemas;


use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Service Information')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),

                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->minValue(0)
                            ->step(0.01),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Only active services will be displayed on the website'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Service Image')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->directory('services')
                            ->imageEditor()
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080')
                            ->imageResizeMode('cover')
                            ->maxSize(10240)
                            ->helperText('Upload any size image - it will be automatically optimized and compressed to under 2MB. Recommended dimensions: 1920x1080px'),
                    ]),

                Section::make('Included Services')
                    ->schema([
                        Repeater::make('included_services')
                            ->label('Services List')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('e.g., Check Engine Light Diagnosis'),
                            ])
                            ->defaultItems(1)
                            ->addActionLabel('Add Service')
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
