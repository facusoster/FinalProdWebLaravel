<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'total',
        'status',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    /* -------------------- Relaciones -------------------- */

    // Un pedido pertenece a un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Un pedido usa una dirección
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    // Un pedido contiene muchos items
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /* -------------------- Scopes -------------------- */

    public function scopePending($query)
    {
        return $query->where('status', 'pendiente');
    }

    public function scopePaid($query)
    {
        return $query->where('status', 'pagado');
    }
}
