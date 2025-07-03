<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverviewWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $startDate = !is_null($this->filters['startDate'] ?? null)
            ? Carbon::parse($this->filters['startDate'])->startOfDay()
            : now()->startOfMonth();

        $endDate = !is_null($this->filters['endDate'] ?? null)
            ? Carbon::parse($this->filters['endDate'])->endOfDay()
            : now()->endOfDay();

        // Revenue: total semua order di range tanggal
        $revenue = Order::whereBetween('created_at', [$startDate, $endDate])->sum('total');

        // New Customers (jika kamu punya role): pastikan hanya ambil role 'customer'
        $newCustomers = User::where('role', 'customer')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        // New Orders
        $newOrders = Order::whereBetween('created_at', [$startDate, $endDate])->count();

        // Format $ (USD) => bisa diubah jadi "Rp" sesuai konteks lokal
        $formatNumber = function (int|float $number): string {
            if ($number < 1000) {
                return (string) Number::format($number, 0);
            }
            if ($number < 1000000) {
                return Number::format($number / 1000, 2) . 'k';
            }
            return Number::format($number / 1000000, 2) . 'm';
        };

        return [
            Stat::make('Revenue', '' . $formatNumber($revenue))
                ->description('Based on actual orders')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17]) // boleh diganti chart dinamis jika ingin
                ->color('success'),

            Stat::make('New customers', $formatNumber($newCustomers))
                ->description('This month')
                ->descriptionIcon('heroicon-m-user-plus')
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color('info'),

            Stat::make('New orders', $formatNumber($newOrders))
                ->description('This month')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('success'),
        ];
    }
}
