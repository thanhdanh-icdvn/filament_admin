<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttributeOptionSkuResource\Pages;
use App\Models\AttributeOptionSku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AttributeOptionSkuResource extends Resource
{
    protected static ?string $model = AttributeOptionSku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Product Management';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sku_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('attribute_option_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sku_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('attribute_option_id')
                    ->numeric()
                    ->sortable(),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListAttributeOptionSkus::route('/'),
            'create' => Pages\CreateAttributeOptionSku::route('/create'),
            'edit' => Pages\EditAttributeOptionSku::route('/{record}/edit'),
        ];
    }
}
