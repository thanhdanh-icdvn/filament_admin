<?php

namespace App\Filament\Resources;

use App\Enums\PaymentTemplateEnum;
use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Payment Management';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->live()
                    ->required(),
                Select::make('bank_id')
                    ->live()
                    ->label('Bank')
                    ->relationship(name: 'bank', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->native(false)
                    ->required()
                    ->afterStateUpdated(
                        function (Set $set, Get $get, $state) {
                            $set('qr', json_encode([
                                'accountNo' => $get('accountNo'),
                                'accountName' => $get('accountName'),
                                'acqId' => $get('bank_id'),
                                'addInfo' => $get('addInfo'),
                                'amount' => $get('amount'),
                                'format' => $get('format'),
                                'template' => $get('template'),
                            ]));
                        }),
                TextInput::make('accountNo')
                    ->live()
                    ->numeric(true)
                    ->required()
                    ->minLength(9)
                    ->maxLength(16)
                    ->required()
                    ->afterStateUpdated(
                        function (Set $set, Get $get, $state) {
                            $set('qr', json_encode([
                                'accountNo' => $get('accountNo'),
                                'accountName' => $get('accountName'),
                                'acqId' => $get('bank_id'),
                                'addInfo' => $get('addInfo'),
                                'amount' => $get('amount'),
                                'format' => $get('format'),
                                'template' => $get('template'),
                            ]));
                        }),
                TextInput::make('accountName')
                    ->live()
                    ->extraAlpineAttributes(['@input' => '$el.value = $el.value.toUpperCase()'])
                    ->required()
                    ->afterStateUpdated(
                        function (Set $set, Get $get, $state) {
                            $set('qr', json_encode([
                                'accountNo' => $get('accountNo'),
                                'accountName' => $get('accountName'),
                                'acqId' => $get('bank_id'),
                                'addInfo' => $get('addInfo'),
                                'amount' => $get('amount'),
                                'format' => $get('format'),
                                'template' => $get('template'),
                            ]));
                        }),
                TextInput::make('amount')
                    ->live()
                    ->numeric(true)
                    ->afterStateUpdated(
                        function (Set $set, Get $get, $state) {
                            $set('qr', json_encode([
                                'accountNo' => $get('accountNo'),
                                'accountName' => $get('accountName'),
                                'acqId' => $get('bank_id'),
                                'addInfo' => $get('addInfo'),
                                'amount' => $get('amount'),
                                'format' => $get('format'),
                                'template' => $get('template'),
                            ]));
                        }),
                TextInput::make('addInfo')
                    ->live()
                    ->afterStateUpdated(
                        function (Set $set, Get $get, $state) {
                            $set('qr', json_encode([
                                'accountNo' => $get('accountNo'),
                                'accountName' => $get('accountName'),
                                'acqId' => $get('bank_id'),
                                'addInfo' => $get('addInfo'),
                                'amount' => $get('amount'),
                                'format' => $get('format'),
                                'template' => $get('template'),
                            ]));
                        }),
                TextInput::make('format')
                    ->live()
                    ->afterStateUpdated(
                        function (Set $set, Get $get, $state) {
                            $set('qr', json_encode([
                                'accountNo' => $get('accountNo'),
                                'accountName' => $get('accountName'),
                                'acqId' => $get('bank_id'),
                                'addInfo' => $get('addInfo'),
                                'amount' => $get('amount'),
                                'format' => $get('format'),
                                'template' => $get('template'),
                            ]));
                        }),
                Select::make('template')
                    ->options(PaymentTemplateEnum::class)
                    ->live()
                    ->native(false)
                    ->afterStateUpdated(
                        function (Set $set, Get $get, $state) {
                            $set('qr', json_encode([
                                'accountNo' => $get('accountNo'),
                                'accountName' => $get('accountName'),
                                'acqId' => $get('bank_id'),
                                'addInfo' => $get('addInfo'),
                                'amount' => $get('amount'),
                                'format' => $get('format'),
                                'template' => $get('template'),
                            ]));
                        }),
                MarkdownEditor::make('qr')
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'heading',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'table',
                        'undo',
                    ])
                    ->live()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bank.name')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
