<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Team Member Information')
                    ->schema([

                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),


                        TextInput::make('position')
                            ->required()
                            ->maxLength(255),




                        Textarea::make('description')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),

                        TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText('Lower numbers appear first'),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Only active team members will be displayed on the website'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Team Member Image')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->directory('team-members')
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('800')
                            ->imageResizeTargetHeight('800')
                            ->imageResizeMode('cover')
                            ->maxSize(10240)
                            ->helperText('Upload any size image - it will be automatically optimized and compressed. Recommended dimensions: 800x800px'),
                    ]),
            ]);
    }
}
