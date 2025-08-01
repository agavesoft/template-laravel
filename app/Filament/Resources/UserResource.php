<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Administration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->label('Nombre'),
            
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Correo Electrónico'),

                Section::make('Roles y Permisos')
                    ->description('Asignar roles y permisos al usuario')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('roles')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->label('Asignar Roles'),

                        Forms\Components\Select::make('permissions')
                            ->relationship('permissions', 'name')
                            ->multiple()
                            ->preload()
                            ->label('Asignar Permisos'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                Tables\Filters\BaseFilter::make('name')
                    ->form([
                        TextInput::make('name')
                            ->label('Nombre')
                            ->placeholder('Buscar por nombre'),
                    ])
                    ->query(fn(Builder $query, array $data) => $query->where('name', 'like', '%' . $data['name'] . '%')),
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make(),
                    ViewAction::make(),                   
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
