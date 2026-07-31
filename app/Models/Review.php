<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    /* -------------------- Relaciones -------------------- */

    // Reseña pertenece a un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Reseña pertenece a un producto
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /* -------------------- Scopes -------------------- */

    public function scopeForProduct($query, $productId)
    {
        return $query->where('product_id', $productId);
    }

    public function scopeWithRating($query, $rating)
    {
        return $query->where('rating', $rating);
    }
}
