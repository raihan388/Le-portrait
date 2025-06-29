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
                Tables\Columns\TextColumn::make('code_order')
                    ->label('Code_Order')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->label('Customer')
                    ->formatStateUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->sortable(['first_name', 'last_name'])
                    ->searchable(['first_name', 'last_name']),
                Tables\Columns\TextColumn::make('address')
                    ->label('Address')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('product')
                    ->label('Product')
                    ->getStateUsing(function ($record) {
                        return $record->items->map(function ($item) {
                            return $item->product->name ;
                        })->implode(', ');
                    })
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Category')
                    ->getStateUsing(function ($record) {
                        return $record->items->map(function ($item) {
                            return $item->product->category->name ;
                        })->implode(', ');
                    })
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand')
                    ->label('Brand')
                    ->getStateUsing(function ($record) {
                        return $record->items->map(function ($item) {
                            return $item->product->brand->name ;
                        })->implode(', ');
                    })
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('product')
                    ->label('Quantity')
                    ->getStateUsing(function ($record) {
                        return $record->items->map(function ($item) {
                            return  $item->quantity ;
                        })->implode(', ');
                    })
                    ->sortable()
                    ->alignCenter()
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
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
