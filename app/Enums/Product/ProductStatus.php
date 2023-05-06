<?php

namespace App\Enums\Product;

use App\Enums\BaseEnum;

enum ProductStatus: int
{
    use BaseEnum;
    case PUBLISHED = 1;
    case DRAFTED = 2;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function badgesArray(): array
    {
        return [
            self::PUBLISHED->value => ['icon' => 'ni-check-bold', 'class' => 'btn-outline-success', 'name' => __('main.published')],
            self::DRAFTED->value => ['icon' => 'ni-archive-2', 'class' => 'btn-outline-secondary', 'name' => __('main.drafted')],
        ];
    }

    public static function key($type)
    {

        $keys = [
            self::PUBLISHED->value => __('main.' . self::PUBLISHED->name),
            self::DRAFTED->value => __('main.' . self::DRAFTED->name),
        ];

        return $keys[$type];
    }

    public static function value($name)
    {
        $values = [
            self::PUBLISHED->name => self::PUBLISHED->value,
            self::DRAFTED->name => self::DRAFTED->value,
        ];

        if (array_key_exists($name, $values)) {
            return $values[$name];
        }
    }
}