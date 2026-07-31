<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image_url',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /* -------------------- Relaciones -------------------- */

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function wishlistedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }

    /* -------------------- Scopes -------------------- */

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->whereHas('categories', fn($q) => $q->where('id', $categoryId));
    }
}
