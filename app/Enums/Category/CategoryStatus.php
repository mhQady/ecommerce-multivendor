<?php

namespace App\Enums\Category;

use App\Enums\BaseEnum;

enum CategoryStatus: int
{
    use BaseEnum;
    case PUBLISHED = 1;
    case DRAFTED = 2;

    public static function badgesArray(): array
    {
        return [
            self::PUBLISHED->value => ['class' => 'badge badge-sm badge-success', 'name' => __('main.published')],
            self::DRAFTED->value => ['class' => 'badge badge-secondary', 'name' => __('main.drafted')],
        ];
    }
}