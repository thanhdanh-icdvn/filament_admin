<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use App\Models\District;
use App\Models\Ward;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Hash;
use Illuminate\Support\Collection;
use Rawilk\FilamentPasswordInput\Password;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->description('Base info')
                    ->collapsible()
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('last_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('username')
                            ->required()
                            ->maxLength(255),
                        // Password::make('password')
                        //     ->password()
                        //     ->required()
                        //     ->dehydrateStateUsing(fn($state) => Hash::make($state))
                        //     ->dehydrated(fn($state) => filled($state))
                        //     ->required(fn(string $context): bool => $context === 'create'),
                        Password::make('password')
                            ->copyable()
                            ->regeneratePassword()
                            ->showPasswordText('Show password')
                            ->hidePasswordText('Hide password')
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mobile_number')
                            ->mask('9999-999-999')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('active')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('postal_code')->mask('999999'),
                    ])->columns(2),
                Section::make()
                    ->description('Address info')
                    ->collapsible()
                    ->collapsed(true)
                    ->schema([
                        Forms\Components\Select::make('province_code')
                            ->relationship(name: 'province', titleAttribute: 'name')
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Forms\Set $set) {
                                $set('district_code', null);
                                $set('ward_code', null);
                            })
                            ->searchable(),
                        Forms\Components\Select::make('district_code')
                            ->options(function (Forms\Get $get): Collection {
                                return District::where('province_code', $get('province_code'))->pluck('name', 'code');
                            })
                            ->live()
                            ->preload()
                            ->searchable()
                            ->afterStateUpdated(function (Forms\Set $set) {
                                $set('ward_code', null);
                            }),
                        Forms\Components\Select::make('ward_code')
                            ->live()
                            ->options(function (Forms\Get $get): Collection {
                                return Ward::where('district_code', $get('district_code'))->pluck('name', 'code');
                            })
                            ->preload()
                            ->searchable(),
                        Forms\Components\TextInput::make('street')
                            ->maxLength(255),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->searchable(),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobile_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('postal_code')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('street')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ward.name')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('district.name')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('province.name')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
