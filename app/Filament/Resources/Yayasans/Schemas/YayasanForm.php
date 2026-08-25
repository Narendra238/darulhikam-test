<?php

namespace App\Filament\Resources\Yayasans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class YayasanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_yayasan')->required(),
                TextInput::make('alamat')->nullable(),
                TextInput::make('telepon')->tel()->nullable(),
                TextInput::make('email')->label('Email address')->email()->nullable(),
                TextInput::make('website')->url()->nullable(),
            ]);
    }
}
