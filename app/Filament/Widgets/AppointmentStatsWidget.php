<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class AppointmentStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected ?string $pollingInterval = '60s';

    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    protected function getStats(): array
    {
        $today = Carbon::today();
        $thisWeek = Carbon::now()->startOfWeek();

        // Today's appointments
        $todayAppointments = Appointment::whereDate('appointment_date', $today)
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        // This week's appointments
        $weekAppointments = Appointment::where('appointment_date', '>=', $thisWeek)
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        // Pending appointments
        $pendingAppointments = Appointment::where('status', 'pending')->count();

        return [
            Stat::make('Today\'s Appointments', $todayAppointments)
                ->description('Scheduled for today')
                ->descriptionIcon('heroicon-m-calendar')
                ->color($todayAppointments > 5 ? 'success' : 'info'),

            Stat::make('This Week', $weekAppointments)
                ->description('Upcoming appointments')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info'),

            Stat::make('Pending Confirmations', $pendingAppointments)
                ->description('Awaiting confirmation')
                ->descriptionIcon('heroicon-m-clock')
                ->color($pendingAppointments > 10 ? 'warning' : 'gray'),
        ];
    }
}
