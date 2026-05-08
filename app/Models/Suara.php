<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suara extends Model
{
    protected $table = 'suara';

    protected $fillable = [
        'idpilihan',
        'suara',
    ];

    public function pilihan(): BelongsTo
    {
        return $this->belongsTo(Pilihan::class, 'idpilihan');
    }
}