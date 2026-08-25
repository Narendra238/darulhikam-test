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
                Select::make('yayasan_id')->relationship('yayasan', 'nama_yayasan')->required(),
                TextInput::make('nama_sekolah')->required(),
                TextInput::make('alamat')->required(),
                TextInput::make('telepon')->tel()->required(),
                TextInput::make('email')->label('Email address')->email()->required(),
                Select::make('jenjang')
                    ->options([
                        'Day Care' => 'Day Care',
                        'TK' => 'TK',
                        'SD' => 'SD',
                        'SMP' => 'SMP',
                        'SMA' => 'SMA',
                    ])
                    ->required(),
            ]);
    }
}
