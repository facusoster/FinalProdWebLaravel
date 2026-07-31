<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
        'subtotal',
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    /* -------------------- Relaciones -------------------- */

    // Item pertenece a un pedido
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Item referencia un producto
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
