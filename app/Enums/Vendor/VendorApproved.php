<?php

namespace App\Enums\Vendor;

use App\Enums\BaseEnum;

enum VendorApproved: int
{
    use BaseEnum;

    case APPROVED = 1;
    case NOT_APPROVED = 0;

    public static function badgesArray(): array
    {
        return [
            self::APPROVED->value => ['class' => 'badge badge-sm badge-info', 'name' => __('main.approved')],
            self::NOT_APPROVED->value => ['class' => 'badge badge-sm badge-warning', 'name' => __('main.not_approved')],
        ];
    }
}