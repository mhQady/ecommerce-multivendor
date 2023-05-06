<?php

namespace App\Enums\Product;

use App\Enums\BaseEnum;

enum ProductType: int
{
    use BaseEnum;
    case PHYSICAL = 1;
    case DIGITAL = 2;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function badgesArray(): array
    {
        return [
            self::PHYSICAL->value => ['class' => 'badge badge-secondary', 'name' => __('main.physical')],
            self::DIGITAL->value => ['class' => 'badge badge-info', 'name' => __('main.digital')],
        ];
    }

    public static function key($type)
    {
        $keys = [
            self::PHYSICAL->value => __('main.' . self::PHYSICAL->name),
            self::DIGITAL->value => __('main.' . self::DIGITAL->name),
        ];

        return $keys[$type];
    }
    public static function value($name)
    {
        $values = [
            self::PHYSICAL->name => self::PHYSICAL->value,
            self::DIGITAL->name => self::DIGITAL->value,
        ];

        if (array_key_exists($name, $values)) {
            return $values[$name];
        }
    }
}