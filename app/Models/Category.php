<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /* -------------------- Relaciones -------------------- */

    // Relación 1:N con productos
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /* -------------------- Scopes -------------------- */

    public function scopeWithProducts($query)
    {
        return $query->with('products');
    }
}
