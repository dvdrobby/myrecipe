<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApiKeysResource\Pages;
use App\Filament\Resources\ApiKeysResource\RelationManagers;
use App\Models\ApiKeys;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApiKeysResource extends Resource
{
    protected static ?string $model = ApiKeys::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make("name")
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make("api_key")
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make("name")
                ->searchable(),

                TextColumn::make("api_key")
                ->searchable(),
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
            'index' => Pages\ListApiKeys::route('/'),
            'create' => Pages\CreateApiKeys::route('/create'),
            'edit' => Pages\EditApiKeys::route('/{record}/edit'),
        ];
    }
}
