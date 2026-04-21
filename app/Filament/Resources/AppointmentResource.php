<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Models\Appointment;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;
    protected static string|\BackedEnum|null $navigationIcon = \Filament\Support\Icons\Heroicon::OutlinedCalendar;
    protected static ?string $navigationLabel = 'Appointments';
    protected static ?int $navigationSort = 3;

    public static function canAccess(): bool
    {
        return auth()->user() && auth()->user()->isAdmin();
    }

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema->components([
            Forms\Components\Select::make('user_id')
                ->label('Customer')
                ->relationship('user', 'name')
                ->searchable()
                ->required()
                ->preload(),
            Forms\Components\TextInput::make('customer_name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('customer_email')
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('customer_phone')
                ->tel()
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('service_type')
                ->label('Service Types')
                ->options([
                    'General Service' => 'General Service',
                    'Oil Change' => 'Oil Change',
                    'Brake Service' => 'Brake Service',
                    'Tire Service' => 'Tire Service',
                    'Engine Diagnostics' => 'Engine Diagnostics',
                    'AC Service' => 'AC Service',
                    'Battery Service' => 'Battery Service',
                    'Transmission Service' => 'Transmission Service',
                    'Inspection' => 'Inspection',
                    'Other' => 'Other',
                ])
                ->multiple()
                ->required(),
            Forms\Components\DatePicker::make('appointment_date')
                ->required()
                ->native(false)
                ->minDate(now())
                ->displayFormat('Y-m-d'),
            Forms\Components\TimePicker::make('appointment_time')
                ->required()
                ->native(false)
                ->minutesStep(30),
            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'confirmed' => 'Confirmed',
                    'cancelled' => 'Cancelled',
                    'completed' => 'Completed',
                ])
                ->required()
                ->default('pending'),
            Forms\Components\Textarea::make('notes')
                ->label('Customer Notes')
                ->maxLength(500)
                ->columnSpanFull(),
            Forms\Components\Textarea::make('admin_notes')
                ->label('Admin Notes')
                ->maxLength(500)
                ->columnSpanFull(),
        ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('user.name')
                ->label('Customer')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('customer_phone')
                ->label('Phone')
                ->searchable(),
            Tables\Columns\TextColumn::make('service_type')
                ->label('Services')
                ->badge()
                ->color('info')
                ->searchable(),
            Tables\Columns\TextColumn::make('appointment_date')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('appointment_time')
                ->time('H:i')
                ->sortable(),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'confirmed' => 'info',
                    'completed' => 'success',
                    'cancelled' => 'danger',
                    default => 'gray',
                })
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Booked At')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->defaultSort('appointment_date', 'desc')
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'pending' => 'Pending',
                    'confirmed' => 'Confirmed',
                    'cancelled' => 'Cancelled',
                    'completed' => 'Completed',
                ]),
            Tables\Filters\SelectFilter::make('service_type')
                ->options([
                    'General Service' => 'General Service',
                    'Oil Change' => 'Oil Change',
                    'Brake Service' => 'Brake Service',
                    'Tire Service' => 'Tire Service',
                    'Engine Diagnostics' => 'Engine Diagnostics',
                    'AC Service' => 'AC Service',
                    'Battery Service' => 'Battery Service',
                    'Transmission Service' => 'Transmission Service',
                    'Inspection' => 'Inspection',
                    'Other' => 'Other',
                ]),
            Tables\Filters\Filter::make('date_range')
                ->form([
                    Forms\Components\DatePicker::make('from')->label('From Date'),
                    Forms\Components\DatePicker::make('to')->label('To Date'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when($data['from'], fn (Builder $query, $date): Builder => $query->whereDate('appointment_date', '>=', $date))
                        ->when($data['to'], fn (Builder $query, $date): Builder => $query->whereDate('appointment_date', '<=', $date));
                }),
        ])
        ->actions([
            \Filament\Actions\ViewAction::make(),
            \Filament\Actions\EditAction::make(),
            \Filament\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            \Filament\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
            'view' => Pages\ViewAppointment::route('/{record}'),
        ];
    }
}
