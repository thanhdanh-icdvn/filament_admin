<?php

namespace App\Filament\Resources;

use App\Enums\ProvinceDivisionTypeEnum;
use App\Filament\Resources\ProvinceResource\Pages;
use App\Models\Province;
use Filament\Forms\Components\Section;
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

class ProvinceResource extends Resource
{
    protected static ?string $model = Province::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Provinces Management';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('code')
                        ->numeric()
                        ->unique(ignorable: fn ($record) => $record)
                        ->required()
                        ->columnSpan([
                            'md' => 2,
                        ]),
                    TextInput::make('name')
                        ->live(debounce: 500)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('codename', Str::slug($state)))
                        ->required()
                        ->columnSpan([
                            'md' => 6,
                        ]),
                    TextInput::make('codename')
                        ->unique(ignorable: fn ($record) => $record)
                        ->required()
                        ->columnSpan([
                            'md' => 4,
                        ]),
                    Select::make('division_type')
                        ->options(ProvinceDivisionTypeEnum::class)
                        ->preload()
                        ->searchable()
                        ->required()
                        ->columnSpan([
                            'md' => 8,
                        ]),
                    TextInput::make('phone_code')
                        ->required()
                        ->numeric()
                        ->columnSpan([
                            'md' => 4,
                        ]),
                ])->columns(12),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('code')->searchable()->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('codename')->searchable()->sortable(),
                TextColumn::make('division_type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone_code')->searchable()->sortable(),
            ])
            ->filters([
                MultiSelectFilter::make('division_type')
                    ->options(ProvinceDivisionTypeEnum::class)
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
