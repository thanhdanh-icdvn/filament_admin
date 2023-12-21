<?php

namespace App\Filament\Resources;

use App\Enums\GenderEnum;
use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\District;
use App\Models\Employee;
use App\Models\Province;
use App\Models\Ward;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
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
                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                Select::make('gender')
                    ->options(GenderEnum::class)
                    ->required(),
                DatePicker::make('dob')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('mobile_number')
                    ->required(),
                Select::make('province_code')
                    ->options(fn (): Collection => Province::query()
                        ->pluck('name', 'code')
                    )
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('district_code', null);
                        $set('ward_code', null);
                    })
                    ->searchable(),
                Select::make('district_code')
                    ->options(fn (Get $get): Collection => District::query()
                        ->where('province_code', $get('province_code'))
                        ->pluck('name', 'code')
                    )
                    ->preload()
                    ->live()
                    ->afterStateUpdated(fn (Set $set) => $set('ward_code', null))
                    ->searchable(),
                Select::make('ward_code')
                    ->options(fn (Get $get): Collection => Ward::query()
                        ->where('district_code', $get('district_code'))
                        ->pluck('name', 'code')
                    )
                    ->preload()
                    ->searchable(),
                TextInput::make('street')
                    ->nullable()
                    ->maxLength(255),
                Select::make('department_id')
                    ->relationship(name: 'department', titleAttribute: 'name'),
                Toggle::make('status')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->searchable(),
                TextColumn::make('last_name')
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
                TextColumn::make('ward_code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('district_code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('province_code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('department_id')
                    ->sortable()
                    ->searchable(),
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
