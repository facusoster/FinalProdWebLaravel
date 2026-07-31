<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* -------------------- Helpers de ROl -------------------- */

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isClient(): bool
    {
        return $this->role === 'cliente';
    }

    /* -------------------- Relaciones -------------------- */

    // Un usuario posee muchas direcciones
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    // Un usuario realiza muchos pedidos
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // Un usuario escribe muchas reseñas
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    // Wishlist: relación N:M con productos
    public function wishlist(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'wishlists')
            ->withTimestamps();
    }

    /* -------------------- Scopes -------------------- */

    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    public function scopeClients($query)
    {
        return $query->where('role', 'cliente');
    }
}
