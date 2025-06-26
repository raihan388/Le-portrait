<?php

namespace App\Filament\Resources\SalesRecapResource\Pages;

use App\Filament\Resources\SalesRecapResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSalesRecap extends EditRecord
{
    protected static string $resource = SalesRecapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
