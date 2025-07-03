<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class OrdersChart extends ChartWidget
{
    protected static ?string $heading = 'Orders per month';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $monthlyOrders = [];
        $labels = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthStart = Carbon::create(null, $i, 1)->startOfMonth();
            $monthEnd = Carbon::create(null, $i, 1)->endOfMonth();

            $count = Order::whereBetween('created_at', [$monthStart, $monthEnd])->count();

            $monthlyOrders[] = $count;
            $labels[] = $monthStart->format('M');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => $monthlyOrders,
                    'borderColor' => '#facc15', // kuning
                    'backgroundColor' => 'rgba(250, 204, 21, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }
}
