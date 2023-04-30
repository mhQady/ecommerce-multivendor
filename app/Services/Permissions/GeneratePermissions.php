<?php


namespace App\Services\Permissions;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class GeneratePermissions
{
    public static function generatePermissions()
    {
        foreach (self::getModels() as $model) {
            self::generateFor($model);
        }
    }
    protected static function generateFor($model)
    {
        $guard = 'admin';
        Permission::firstOrCreate(['name' => 'browse ' . $model, 'model' => $model, 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'edit ' . $model, 'model' => $model, 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'create ' . $model, 'model' => $model, 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'delete ' . $model, 'model' => $model, 'guard_name' => $guard]);
    }
    protected static function getModels()
    {
        $modelFiles = Storage::disk('app')->files('Models');

        $models = collect($modelFiles)->map(function ($modelFile) {
            $model = str_replace('.php', '', $modelFile);

            $model = str_replace('Models/', '', $model);

            return Str::lower($model);
        })->diff(self::diffArray())->merge(self::mergedArray());

        return $models;
    }
    protected static function mergedArray(): array
    {
        return [
            'role',
        ];
    }
    protected static function diffArray(): array
    {
        return [
            'productunit',
            'productoption',
            'producttag',
            'productattribute',
            'phonecode',
            'cart',
            'cartfeature',
            'compare',
            'favorite',
            'tempuploader',
        ];
    }
}
