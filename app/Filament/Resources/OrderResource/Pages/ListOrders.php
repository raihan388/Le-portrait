<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use App\Exports\OrdersExport;
use Filament\Tables\Actions\ExportAction;
class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
             Actions\ExportAction::make()
                ->exporter(OrdersExport::class),

            
        ];
    }
    protected function getActions(): array
    {
        return [
            Actions\ExportAction::make()
                ->exporter(OrdersExport::class),
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return OrderResource::getWidgets();
        
    }

    
}
