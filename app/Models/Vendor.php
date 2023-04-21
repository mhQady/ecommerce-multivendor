<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function store(): HasOne
    {
        return $this->hasOne(Store::class);
    }

    public function password(): Attribute
    {
        return Attribute::make(
        set: fn($value) => Hash::make($value),
        );
    }
}