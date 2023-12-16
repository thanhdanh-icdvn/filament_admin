<?php

namespace App\Filament\Resources;

use App\Enums\GenderEnum;
use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers\PaymentMethodsRelationManager;
use App\Models\Customer;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

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
                Section::make('')
                    ->schema([
                        TextInput::make('last_name')->required(),
                        TextInput::make('first_name')->nullable(),
                        TextInput::make('email')->required(),
                        TextInput::make('password')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create'),
                        DateTimePicker::make('email_verified_at')
                            ->nullable()
                            ->default(null),
                        Select::make('gender')
                            ->options(GenderEnum::class)->native(false)
                            ->label('Gender')
                            ->required(),
                        TextInput::make('phone_number'),
                        DateTimePicker::make('birth_date'),
                        TextInput::make('avatar_type')->nullable(),
                        TextInput::make('avatar_location')->nullable(),
                        TextInput::make('timezone')->nullable(),
                        Toggle::make('opt_in')->columnSpanFull(),
                        DateTimePicker::make('last_login_at')->nullable(),
                        TextInput::make('last_login_ip')->ip()->nullable(),
                    ])->columns(2),
                Section::make('Payment Methods')
                    ->description('Payment methods information')
                    ->schema([
                        Repeater::make('payment_methods')
                            ->relationship('payment_methods')
                            ->schema([
                                TextInput::make('card_number')->mask('9999 9999 9999 9999')->placeholder('1223 4568 7644 4839')->required(),
                                TextInput::make('card_holder_name')
                                    ->extraAlpineAttributes(['@input' => '$el.value = $el.value.toUpperCase()'])
                                    ->required(),
                                TextInput::make('exp_month')->mask('99')->placeholder('10')->required(),
                                TextInput::make('exp_year')->mask('99')->placeholder('25')->required(),
                                TextInput::make('cvc')->mask('999')->placeholder('123')->required(),
                            ]),
                    ]),
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
                TextColumn::make('gender'),
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
            PaymentMethodsRelationManager::class,
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
