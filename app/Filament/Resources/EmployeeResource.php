<?php

namespace App\Filament\Resources;

use App\Enums\GenderEnum;
use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\District;
use App\Models\Employee;
use App\Models\Province;
use App\Models\Ward;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->description('Require Information')->schema([
                    TextInput::make('first_name')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(6),
                    TextInput::make('last_name')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(6),
                    Select::make('gender')
                        ->options(GenderEnum::class)
                        ->required()
                        ->columnSpan(6),
                    DatePicker::make('dob')
                        ->required()
                        ->columnSpan(6),
                    TextInput::make('email')
                        ->email()
                        ->required()->columnSpan(6),
                    TextInput::make('mobile_number')
                        ->required()->columnSpan(6),
                ])->columns(12),
                Section::make()
                    ->description('Address Information')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Select::make('province_code')
                            ->options(
                                fn (): Collection => Province::query()
                                    ->pluck('name', 'code')
                            )
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('district_code', null);
                                $set('ward_code', null);
                            })
                            ->searchable()->columnSpan(6),
                        Select::make('district_code')
                            ->options(
                                fn (Get $get): Collection => District::query()
                                    ->where('province_code', $get('province_code'))
                                    ->pluck('name', 'code')
                            )
                            ->preload()
                            ->live()
                            ->afterStateUpdated(fn (Set $set) => $set('ward_code', null))
                            ->searchable()->columnSpan(6),
                        Select::make('ward_code')
                            ->options(
                                fn (Get $get): Collection => Ward::query()
                                    ->where('district_code', $get('district_code'))
                                    ->pluck('name', 'code')
                            )
                            ->preload()
                            ->searchable()->columnSpan(6),
                        TextInput::make('street')
                            ->nullable()
                            ->maxLength(255)->columnSpan(6),
                    ])->columns(12),
                Section::make()
                    ->description('Department and Manager')
                    ->schema([
                        Select::make('department_id')
                            ->relationship(name: 'department', titleAttribute: 'name')
                            ->columnSpan(6),
                        Select::make('employee_id')
                            ->relationship(name: 'manager', titleAttribute: 'id')
                            ->columnSpan(6),
                    ])->columns(12),
                Toggle::make('status')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('last_name')->sortable()->searchable(),
                TextColumn::make('manager.full_name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('dob')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('gender')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('street')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('ward.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('district.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('province.name')
                    ->sortable()
                    ->searchable(),
                IconColumn::make('status')
                    ->boolean()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('department.name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
