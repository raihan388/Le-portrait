<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Filament\Resources\OrderResource\Pages\ListOrders;
use App\Models\Order;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderStats extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?string $pollingInterval = null;
    

    protected function getTablePage(): string
    {
        return ListOrders::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Orders', $this->getPageTableQuery()->count())
                ->description('All completed orders')
                ->descriptionIcon('heroicon-o-shopping-bag')
                ->color('primary'),
        ];
    }

}