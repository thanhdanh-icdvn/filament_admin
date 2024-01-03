<?php

namespace App\Filament\Resources;

use App\Enums\WardDivisionTypeEnum;
use App\Filament\Resources\WardResource\Pages;
use App\Models\Ward;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Table;
use Str;

class WardResource extends Resource
{
    protected static ?string $model = Ward::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Provinces Management';

    protected static ?int $navigationSort = 3;

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
                    ->options(WardDivisionTypeEnum::class)
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('district_code')
                    ->relationship(name: 'district', titleAttribute: 'name')
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
                TextColumn::make('name')->searchable()
                    ->sortable(),
                TextColumn::make('codename')->searchable()
                    ->sortable(),
                TextColumn::make('code')->searchable()
                    ->sortable(),
                TextColumn::make('division_type')->searchable()
                    ->sortable(),
                TextColumn::make('district.name')->searchable()
                    ->sortable(),
            ])
            ->filters([
                MultiSelectFilter::make('division_type')
                    ->options(WardDivisionTypeEnum::class)
                    ->multiple()
                    ->preload()
                    ->searchable(),
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
            'index' => Pages\ListWards::route('/'),
            'create' => Pages\CreateWard::route('/create'),
            'edit' => Pages\EditWard::route('/{record}/edit'),
        ];
    }
}
