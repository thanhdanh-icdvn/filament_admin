<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProvinceResource\Pages;
use App\Models\Province;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProvinceResource extends Resource
{
    protected static ?string $model = Province::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('id')
                        ->numeric()
                        ->columnSpan([
                            'md' => 2,
                        ]),
                    TextInput::make('name')
                        ->columnSpan([
                            'md' => 6,
                        ]),
                    TextInput::make('codename')
                        ->columnSpan([
                            'md' => 4,
                        ]),
                    TextInput::make('code')->numeric()
                        ->columnSpan([
                            'md' => 2,
                        ]),
                    TextInput::make('division_type')
                        ->columnSpan([
                            'md' => 8,
                        ]),
                    TextInput::make('phone_code')
                        ->numeric()
                        ->columnSpan([
                            'md' => 2,
                        ]),
                ])->columns(12),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('codename'),
                TextColumn::make('code'),
                TextColumn::make('division_type'),
                TextColumn::make('phone_code'),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProvinces::route('/'),
            'create' => Pages\CreateProvince::route('/create'),
            'edit' => Pages\EditProvince::route('/{record}/edit'),
        ];
    }
}
