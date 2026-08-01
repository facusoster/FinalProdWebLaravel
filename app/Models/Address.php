<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'street',
        'city',
        'province',
        'postal_code',
        'country',
    ];

    /* -------------------- Relaciones -------------------- */

    // Una dirección pertenece a un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Una dirección puede ser usada en muchos pedidos
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
