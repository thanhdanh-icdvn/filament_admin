<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\City;
use App\Models\Employee;
use App\Models\State;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Employee Management';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Name')
                    ->description('Employee name details')
                    ->schema([
                        TextInput::make('last_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('middle_name')
                            ->default(''),
                        TextInput::make('first_name')
                            ->required()
                            ->maxLength(255),
                    ])->columns(3),
                Section::make('Address')
                    ->description('Employee address information')
                    ->schema([
                        Select::make('country_id')
                            ->relationship(
                                name: 'country',
                                titleAttribute: 'name'
                            )
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(
                                function (Set $set) {
                                    $set('state_id', null);
                                    $set('city_id', null);
                                })
                            ->native(false)
                            ->required(),
                        Select::make('state_id')
                            ->options(
                                fn (Get $get): Collection => State::query()
                                    ->where(
                                        'country_id',
                                        $get('country_id')
                                    )
                                    ->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(
                                function (Set $set) {
                                    $set('city_id', null);
                                })
                            ->native(false)
                            ->required(),
                        Select::make('city_id')
                            ->options(
                                fn (Get $get): Collection => City::query()
                                    ->where(
                                        'state_id',
                                        $get('state_id')
                                    )
                                    ->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->native(false)
                            ->required(),
                        Select::make('department_id')
                            ->relationship(
                                name: 'department',
                                titleAttribute: 'name'
                            )
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->required(),
                        TextInput::make('address')
                            ->maxLength(255),
                        TextInput::make('zip_code'),
                    ])->columns(2),

                Section::make('Dates')->schema([
                    DatePicker::make('date_of_birth')
                        ->native(true)
                        ->displayFormat('d/m/Y')
                        ->required(),
                    DatePicker::make('date_hired')
                        ->native(true)
                        ->displayFormat('d/m/Y')
                        ->default(now())
                        ->required(),
                ])->columns(2),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()->color('success'),
                    EditAction::make()->color('info'),
                    DeleteAction::make(),
                ]),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
