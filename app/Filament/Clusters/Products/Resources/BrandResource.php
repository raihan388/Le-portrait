<?php

namespace App\Filament\Clusters\Products\Resources;

use App\Filament\Clusters\Products\Resources\BrandResource\Pages;
use App\Models\Brand;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use App\Filament\Clusters\Products;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $cluster = Products::class;

    protected static ?string $recordTitleAttribute = 'name';

     protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

     protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {

        function generateNextBrandId()
        {
            $existingIds = Brand::orderBy('brand_id')->pluck('brand_id')->toArray();

            $index = 1;
            foreach ($existingIds as $id) {
                $expected = 'BRD-' . str_pad($index, 3, '0', STR_PAD_LEFT);
                    if ($id !== $expected) {
                        return $expected;
                    }
                    $index++;
            }

            return 'BRD-' . str_pad($index, 3, '0', STR_PAD_LEFT);
        }   

        return $form
            ->schema([
               Section::make([
                    Grid::make()
                    ->schema([
                        TextInput::make('brand_id')
                            ->label('BrandID')
                            ->disabled()
                            ->dehydrated()
                            ->default(fn () => generateNextBrandId())
                            ->unique(Brand::class, 'brand_id', ignoreRecord: true),
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, callable $set ) => $operation === 'create' ? $set('slug', str($state)->slug()) : null),
                        TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->maxLength(255)
                            ->dehydrated()
                            ->unique(Brand::class,'slug',ignoreRecord: true),
                    ]),
                    Toggle::make('is_active')
                        ->required()
                        ->default(true)
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
{
    /** @var class-string<Brand> $modelClass */
    $modelClass = static::$model;

    return (string) $modelClass::count(); 
}
}
