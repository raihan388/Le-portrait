<?php

namespace App\Filament\Resources\SalesRecapResource\Pages;

use App\Filament\Resources\SalesRecapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalesRecaps extends ListRecords
{
    protected static string $resource = SalesRecapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
