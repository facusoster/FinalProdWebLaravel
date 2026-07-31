    <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
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

    // N:M con categorías
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    // Un producto aparece en muchos items de pedido
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Un producto recibe muchas reseñas
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    // Wishlist: N:M con usuarios
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
