<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Faker\Core\File;
use Filament\Tables;
use App\Models\Komik;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use function Laravel\Prompts\select;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\KomikResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KomikResource\RelationManagers;

class KomikResource extends Resource
{
    protected static ?string $model = Komik::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nama_komik')->required(),
                        TextInput::make('pencipta')->required(),
                        TextInput::make('penerbit')->required(),
                        Select::make('genre_id')->label('genre')->relationship('genre', 'nama_genre')->required(),
                        FileUpload::make('gambar')
                        ->image()->directory('img/komik'),
                        Textarea::make('deskripsi')->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('nama_komik')->searchable(),
                TextColumn::make('pencipta')->searchable(),
                TextColumn::make('penerbit')->searchable(),
                TextColumn::make('genre.nama_genre')->label('Genre')->searchable(),
                ImageColumn::make('gambar')->searchable(),
                TextColumn::make('deskripsi')->searchable(),
            ])
            ->filters([
                // Filter::make('bucin'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make()
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
            'index' => Pages\ListKomiks::route('/'),
            'create' => Pages\CreateKomik::route('/create'),
            'edit' => Pages\EditKomik::route('/{record}/edit'),
        ];
    }


}
