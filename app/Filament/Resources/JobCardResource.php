<?php

namespace App\Filament\Resources;

use App\Models\JobCard;
use App\Models\Vehicle;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Actions\DeleteBulkAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JobCardResource extends Resource
{
    protected static ?string $model = JobCard::class;
    protected static string|\BackedEnum|null $navigationIcon = \Filament\Support\Icons\Heroicon::OutlinedClipboardDocument;
    protected static ?string $navigationLabel = 'Job Cards';
    protected static ?string $modelLabel = 'Job Card';

    public static function canAccess(): bool
    {
        $user = Auth::user();
        return $user && (
            ($user->isAdmin()) ||
            ($user->isTechnician()) ||
            ($user->isCustomer())
        );
    }

    public static function getNavigationLabel(): string
    {
        $user = Auth::user();
        if ($user && method_exists($user, 'isCustomer') && $user->isCustomer()) {
            return 'My Job Cards';
        }
        return 'Job Cards';
    }

    public static function canCreate(): bool
    {
        return Auth::user()->isAdmin() || Auth::user()->role === 'technician';
    }

    public static function canEdit(Model $record): bool
    {
        return Auth::user()->isAdmin() || Auth::user()->role === 'technician';
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::user()->isAdmin();
    }

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('vehicle_id')
                    ->relationship('vehicle', 'license_plate')
                    ->required(),
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required()
                    ->hidden(),
                Forms\Components\Select::make('technician_id')
                    ->relationship('technician', 'name', function ($query) {
                        return $query->where('role', 'technician');
                    })
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'open' => 'Open',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('open')
                    ->required(),
                Forms\Components\DatePicker::make('scheduled_date')
                    ->default(now()->toDateString()),
                Forms\Components\DatePicker::make('completed_date'),
                Forms\Components\Textarea::make('customer_requirements')->label('Customer Requirements'),
                Forms\Components\Textarea::make('technician_comments')->label('Technician Comments'),
                Forms\Components\Textarea::make('vehicle_condition')->label('Vehicle Condition'),
                Forms\Components\Textarea::make('notes')->label('Notes'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        $user = Auth::user();
        $columns = [
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('vehicle.license_plate')->label('Vehicle'),
            Tables\Columns\TextColumn::make('status'),
        ];
        if ($user && $user->isAdmin()) {
            $columns[] = Tables\Columns\TextColumn::make('customer.name')->label('Customer');
            $columns[] = Tables\Columns\TextColumn::make('technician.name')->label('Technician');
        } elseif ($user && $user->isTechnician()) {
            $columns[] = Tables\Columns\TextColumn::make('customer.name')->label('Customer');
        }
        return $table
            ->columns($columns)
            ->bulkActions([
                DeleteBulkAction::make(),
            ])
            ->modifyQueryUsing(function ($query) use ($user) {
                if ($user && $user->isAdmin()) {
                    return $query;
                }
                if ($user && $user->isTechnician()) {
                    // Technicians see all job cards
                    return $query;
                }
                if ($user && $user->isCustomer()) {
                    // Customers see only their job cards
                    return $query->where('customer_id', $user->id);
                }
                // Default: restrict access
                return $query->whereRaw('1 = 0');
            });
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\JobCardResource\Pages\ListJobCards::route('/'),
            'create' => \App\Filament\Resources\JobCardResource\Pages\CreateJobCard::route('/create'),
            'edit' => \App\Filament\Resources\JobCardResource\Pages\EditJobCard::route('/{record}/edit'),
        ];
    }
}
