<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasRoles;

    protected $guarded = ['id'];

    public function password(): Attribute
    {
        return Attribute::make(
        set: fn($value) => Hash::make($value),
        ); }
}