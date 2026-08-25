<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yayasan extends Model
{
    protected $guarded = [];

    public function sekolahs()
    {
        return $this->hasMany(Sekolah::class); // Relasi One-to-Many
    }
}
