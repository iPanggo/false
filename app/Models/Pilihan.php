<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pilihan extends Model
{
    protected $table = 'pilihan';

    protected $fillable = [
        'name',
        'description',
    ];

    public function suara(): HasMany
    {
        return $this->hasMany(Suara::class, 'idpilihan');
    }
}