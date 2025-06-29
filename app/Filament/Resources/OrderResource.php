<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\OrderItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SelectColumn;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Tables\Actions\ExportAction;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
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
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable(),
                SelectColumn::make('order_status')
                    ->label('Status Order')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->rules(['required', 'in:pending,processing,completed,cancelled'])
                    ->sortable()
                    ->searchable(),    
                Tables\Columns\TextColumn::make('payment_method')
                    ->label('Payment')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('order_status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->label('Status Order'),
            ])
            ->actions([ 
                    Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportAction::make('export_orders')
                    ->label('Export Selected Orders')
                    ->exporter(\App\Exports\OrdersExport::class),
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
            'index' => Pages\ListOrders::route('/'),
            //'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        /** @var class-string<Order> $modelClass */
        $modelClass = static::$model;

        return (string) $modelClass::count(); 
    }
    // public static function getWidgets(): array
    // {
    //     return [
    //         OrderStats::class,
    //     ];
    // }

}

