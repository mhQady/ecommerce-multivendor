<?php

namespace App\Enums\Vendor;

use App\Enums\BaseEnum;

enum VendorActive: int
{
    use BaseEnum;

    case ACTIVE = 1;
    case SUSPENDED = 0;

    public static function badgesArray(): array
    {
        return [
            self::ACTIVE->value => ['class' => 'badge badge-sm badge-success', 'name' => __('main.active')],
            self::SUSPENDED->value => ['class' => 'badge badge-sm badge-danger', 'name' => __('main.suspended')],
        ];
    }
}