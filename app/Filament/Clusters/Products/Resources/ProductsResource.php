<?php

namespace App\Filament\Clusters\Products\Resources;

use App\Filament\Clusters\Products\Resources\ProductsResource\Pages;
use App\Filament\Clusters\Products\Resources\ProductResource\Widgets\ProductStats;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use App\Filament\Clusters\Products;

class ProductsResource extends Resource
{
    protected static ?string $model = Product::class;

    
    protected static ?string $cluster = Products::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    protected static ?string $navigationLabel = 'Products';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        function generateNextProductId()
        {
            $existingIds = Product::orderBy('product_id')->pluck('product_id')->toArray();

            $index = 1;
            foreach ($existingIds as $id) {
                $expected = 'PRD-' . str_pad($index, 3, '0', STR_PAD_LEFT);
                    if ($id !== $expected) {
                        return $expected;
                    }
                    $index++;
            }

            return 'PRD-' . str_pad($index, 3, '0', STR_PAD_LEFT);
        }
        return $form
            ->schema([
                Group::make()->schema ([
                    Section::make('Product Information')->schema([
                        TextInput::make('product_id')
                            ->label('ProductID')
                            ->disabled()
                            ->dehydrated()
                            ->default(fn () => generateNextProductId())
                            ->unique(Product::class, 'product_id', ignoreRecord: true),
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
                            ->unique(Product::class,'slug',ignoreRecord: true),

                        TextInput::make('stock')
                            ->label('Stok')
                            ->numeric()
                            ->reactive() 
                            ->afterStateUpdated(function ($state, callable $set) {
                                $stock = (int) $state;
                                if ($stock > 5) {
                                    $set('in_stock', false);
                                } else {
                                    $set('in_stock', true);
                                }
                            }),

                        MarkdownEditor::make('description')
                            ->columnSpanFull()
                            ->fileAttachmentsDirectory('products')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])->columns(2),

                        Section::make('Images')->schema([
                            FileUpload::make('images')
                                ->multiple()
                                ->directory('products')
                                ->maxfiles(5)
                                ->reorderable()
                                ->storeFileNamesIn('image')
                                ->disk('public')
                                ->visibility('public')
                        ])

                ])->columnspan(2),

                        Section::make('Price')->schema([
                            TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->prefix('Rp ')
                        ]),

                        Section::make('Categories & Brands')->schema([
                            Select::make('category_id')
                                ->relationship('category', 'name')
                                ->required()
                                ->searchable()
                                ->preload(),

                            Select::make('brand_id')
                                ->relationship('brand', 'name')
                                ->required()
                                ->searchable()
                                ->preload(),
                        ]),

                        Section::make('Status')->schema([
                            Toggle::make('is_active')
                                ->required()
                                ->default(true)
                                ->label('Active'),

                            Toggle::make('is_featured')
                                ->default(false)
                                ->label('Featured'),

                            Toggle::make('in_stock')
                                ->default(true)
                                ->label('In Stock'),

                            Toggle::make('on_sale')
                                ->default(false)
                                ->label('On Sale'),
                        ])

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_id')
                    ->label('ProductID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Brand')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('IDR', true)
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
                Tables\Columns\IconColumn::make('in_stock')
                    ->boolean()
                    ->label('In Stock'),
                Tables\Columns\IconColumn::make('on_sale')
                    ->boolean()
                    ->label('On Sale'),
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
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Category'),
                Tables\Filters\SelectFilter::make('brand_id')
                    ->relationship('brand', 'name')
                    ->label('Brand'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
public static function getNavigationBadge(): ?string
{
    /** @var class-string<Product> $modelClass */
    $modelClass = static::$model;

    return (string) $modelClass::count(); // Menghitung jumlah seluruh produk berdasarkan ID
}
}
