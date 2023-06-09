<?php

namespace App\Models;

use App\Models\Store;
use App\Models\Product;
use App\Enums\Vendor\VendorActive;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $perPage = 25;

    public function store(): HasOne
    {
        return $this->hasOne(Store::class);
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function password(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Hash::make($value),
        );
    }

    protected function isBlocked(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['is_active'] === VendorActive::SUSPENDED->value,
        );
    }
}