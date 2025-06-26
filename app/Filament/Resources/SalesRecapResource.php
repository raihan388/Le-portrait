<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalesRecapResource\Pages;
use App\Filament\Resources\SalesRecapResource\RelationManagers;
use App\Models\SalesRecap;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SalesRecapResource extends Resource
{
    protected static ?string $model = SalesRecap::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSalesRecaps::route('/'),
            'create' => Pages\CreateSalesRecap::route('/create'),
            'edit' => Pages\EditSalesRecap::route('/{record}/edit'),
        ];
    }
}
