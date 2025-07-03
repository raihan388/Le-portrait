<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class CustomersChart extends ChartWidget
{
    protected static ?string $heading = 'Total customers';

    protected static ?int $sort = 2;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $monthlyCumulative = [];
        $labels = [];
        $total = 0;

        // Loop dari bulan 1 ke 12
        for ($i = 1; $i <= 12; $i++) {
            $monthStart = Carbon::create(null, $i, 1)->startOfMonth();
            $monthEnd = Carbon::create(null, $i, 1)->endOfMonth();

            // Jumlah customer sampai akhir bulan ini (kumulatif)
            $count = User::whereDate('created_at', '<=', $monthEnd)->count();

            $monthlyCumulative[] = $count;
            $labels[] = $monthStart->format('M'); // 'Jan', 'Feb', dst
        }

        return [
            'datasets' => [
                [
                    'label' => 'Customers',
                    'data' => $monthlyCumulative,
                    'borderColor' => '#facc15', // warna kuning
                    'backgroundColor' => 'rgba(250, 204, 21, 0.1)', // kuning transparan
                    'fill' => true,
                    'tension' => 0.4, // garis agak halus melengkung
                ],
            ],
            'labels' => $labels,
        ];
    }
}
