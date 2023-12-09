<?php

namespace App\Filament\Resources;

use App\Enums\GenderEnum;
use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Customer Management';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')->schema([
                    TextInput::make('last_name')->required(),
                    TextInput::make('first_name')->nullable(),
                    TextInput::make('email')->required(),
                    TextInput::make('password')
                        ->password()
                        ->dehydrateStateUsing(fn ($state) => \Hash::make($state))
                        ->dehydrated(fn ($state) => filled($state))
                        ->required(fn (string $context): bool => $context === 'create'),
                    DateTimePicker::make('email_verified_at')
                        ->default(now()),
                    Select::make('gender')
                        ->options(GenderEnum::class)->native(false)
                        ->label('Gender'),
                    TextInput::make('phone_number'),
                    DateTimePicker::make('birth_date'),
                    TextInput::make('avatar_type'),
                    TextInput::make('avatar_location'),
                    TextInput::make('timezone'),
                    Toggle::make('opt_in')->columnSpanFull(),
                    DateTimePicker::make('last_login_at'),
                    TextInput::make('last_login_ip')->ip(),
                ])->columns(2),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('last_name'),
                TextColumn::make('first_name'),
                TextColumn::make('email'),
                TextColumn::make('password'),
                TextColumn::make('email_verified_at'),
                SelectColumn::make('gender')
                    ->options(GenderEnum::class),
                TextColumn::make('phone_number'),
                TextColumn::make('birth_date')->dateTime(),
                TextColumn::make('avatar_type'),
                TextColumn::make('avatar_location'),
                TextColumn::make('timezone'),
                ToggleColumn::make('opt_in'),
                TextColumn::make('last_login_at')->dateTime(),
                TextColumn::make('last_login_ip'),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
