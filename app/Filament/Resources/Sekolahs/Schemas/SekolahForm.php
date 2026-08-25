<?php

namespace App\Filament\Resources\Sekolahs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class SekolahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('yayasan_id')
                    ->relationship('yayasan', 'nama_yayasan')
                    ->required(),
                TextInput::make('nama_sekolah')
                    ->required(),
                TextInput::make('alamat'),
                TextInput::make('telepon')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('jenjang')
                    ->required(),
            ]);
    }
}
