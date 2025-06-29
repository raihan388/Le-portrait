<?php

namespace App\Exports;

use App\Models\Order;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Collection;

class OrdersExport extends Exporter
{
    protected static ?string $model = Order::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('code_order')
                ->label('Code Order'),

            ExportColumn::make('customer')
                ->label('Customer')
                ->formatStateUsing(fn (Order $record) => $record->first_name . ' ' . $record->last_name),

            ExportColumn::make('address')
                ->label('Address'),

            ExportColumn::make('products')
                ->label('Product')
                ->formatStateUsing(fn (Order $record) => $record->items->pluck('product.name')->filter()->join(', ')),

            ExportColumn::make('categories')
                ->label('Category')
                ->formatStateUsing(fn (Order $record) => $record->items->pluck('product.category.name')->filter()->join(', ')),

            ExportColumn::make('brands')
                ->label('Brand')
                ->formatStateUsing(fn (Order $record) => $record->items->pluck('product.brand.name')->filter()->join(', ')),

            ExportColumn::make('quantities')
                ->label('Quantity')
                ->formatStateUsing(fn (Order $record) => $record->items->pluck('quantity')->join(', ')),

            ExportColumn::make('total')
                ->label('Total')
                ->formatStateUsing(fn (Order $record) => number_format($record->total, 2)),

            ExportColumn::make('order_status')
                ->label('Status Order')
                ->formatStateUsing(fn (Order $record) => ucfirst($record->order_status)),

            ExportColumn::make('payment_method')
                ->label('Payment Method'),

            ExportColumn::make('created_at')
                ->label('Date')
                ->formatStateUsing(fn (Order $record) => $record->created_at->format('Y-m-d H:i')),
        ];
    }

public static function getFooter(Collection $rows): ?array
{
    $total = $rows->sum(function ($row) {
        return (float) str_replace(',', '', $row['total'] ?? 0);
    });

    return [
        'code_order' => 'TOTAL',
        'total' => number_format($total, 2),
    ];
}

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your order export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
