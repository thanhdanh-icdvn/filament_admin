<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Employee;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                DatePicker::make('dob')
                    ->native(false)
                    ->required(),
                Select::make('province_id')
                    ->relationship(name: 'province', titleAttribute: 'name')
                    ->preload()
                    ->searchable(),
                Select::make('district_id')
                    ->relationship(name: 'district', titleAttribute: 'name')
                    ->preload()
                    ->searchable(),
                Select::make('ward_id')
                    ->relationship(name: 'ward', titleAttribute: 'name')
                    ->preload()
                    ->searchable(),
                TextInput::make('street')
                    ->nullable()
                    ->maxLength(255),
                Select::make('department_id')
                    ->relationship(name: 'department', titleAttribute: 'name'),
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
                TextColumn::make('ward.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('district.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('province.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('province.name')
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
