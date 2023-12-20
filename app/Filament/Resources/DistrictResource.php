<?php

namespace App\Filament\Resources;

use App\Enums\DistrictDivisionTypeEnum;
use App\Filament\Resources\DistrictResource\Pages;
use App\Models\District;
use App\Models\Province;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Str;

class DistrictResource extends Resource
{
    protected static ?string $model = District::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Provinces Management';

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code')->required(),
                TextInput::make('name')
                    ->live(debounce: 500)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('codename', Str::slug($state)))
                    ->required(),
                TextInput::make('codename')->required(),
                Select::make('division_type')
                    ->options(DistrictDivisionTypeEnum::class)
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('province_code')
                    ->relationship(name: 'province', titleAttribute: 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('codename')->sortable()->searchable(),
                TextColumn::make('code')->sortable()->searchable(),
                SelectColumn::make('division_type')
                    ->options(DistrictDivisionTypeEnum::class)
                    ->sortable()
                    ->searchable(),
                SelectColumn::make('province_code')
                    ->label('Province')
                    ->options(fn () => Province::pluck('name', 'code'))
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
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
            'index' => Pages\ListDistricts::route('/'),
            'create' => Pages\CreateDistrict::route('/create'),
            'edit' => Pages\EditDistrict::route('/{record}/edit'),
        ];
    }
}
