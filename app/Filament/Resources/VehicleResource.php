<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleResource\Pages;
use App\Models\Vehicle;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
// use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class VehicleResource extends Resource
{
    public static function canAccess(): bool
    {
        return auth()->user() &&
            (
                (method_exists(auth()->user(), 'isAdmin') && auth()->user()->isAdmin()) ||
                (method_exists(auth()->user(), 'isCustomer') && auth()->user()->isCustomer())
            );
    }

        protected static ?string $model = Vehicle::class;
        protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedTruck;
        protected static ?string $navigationLabel = 'Vehicles';
        protected static ?string $modelLabel = 'Vehicle';

        public static function getNavigationLabel(): string
        {
            $user = auth()->user();
            if ($user && method_exists($user, 'isCustomer') && $user->isCustomer()) {
                return 'My Vehicles';
            }
            return 'Vehicles';
        }

    public static function form(Schema $schema): Schema
    {
        $user = auth()->user();
        $fields = [
            Forms\Components\TextInput::make('make')
                ->label('Make')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('model')
                ->label('Model')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('year')->required(),
            Forms\Components\TextInput::make('license_plate')
                ->required()
                ->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('mileage')
                ->label('Mileage')
                ->numeric()
                ->minValue(0)
                ->required(),
            // Forms\Components\FileUpload::make('photo')
            //     ->label('Photo')
            //     ->image()
            //     //->disk('public')
            //     ->disk(env('FILESYSTEM_DISK', 'public'))   // 👈 picks 'railway' on Railway, 'public' locally
            //     ->directory('vehicle-photos')
            //     ->imagePreviewHeight('250')
            //     ->maxSize(2048),
        ];
        if ($user && method_exists($user, 'isAdmin') && $user->isAdmin()) {
            $fields[] = Forms\Components\Select::make('user_id')
                ->label('Customer')
                ->relationship('user', 'name')
                ->required();
        }
        return $schema->schema($fields);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        $user = auth()->user();
        $columns = [
            // Tables\Columns\ImageColumn::make('photo_url')
            //     ->label('Image')
            //     ->disk(env('FILESYSTEM_DISK', 'public'))   // 👈 same disk as upload
            //     ->square()
            //     ->size(60),
            Tables\Columns\TextColumn::make('make'),
            Tables\Columns\TextColumn::make('model'),
            Tables\Columns\TextColumn::make('year'),
            Tables\Columns\TextColumn::make('license_plate'),
        ];
        if ($user && method_exists($user, 'isAdmin') && $user->isAdmin()) {
            $columns[] = Tables\Columns\TextColumn::make('user.name')->label('Owner');
        }
        return $table
            ->columns($columns)
            ->modifyQueryUsing(function (Builder $query) {
                $user = auth()->user();
                if ($user && method_exists($user, 'isAdmin') && $user->isAdmin()) {
                    // Admin sees all vehicles
                    return $query;
                }
                if ($user && method_exists($user, 'isCustomer') && $user->isCustomer()) {
                    // Customers see only their vehicles
                    return $query->where('user_id', $user->id);
                }
                // Default: restrict access
                return $query->whereRaw('1 = 0');
            });
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }
}
