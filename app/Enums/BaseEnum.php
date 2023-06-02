<?php

namespace App\Enums;

trait BaseEnum
{

    public static function casesArray(): array
    {
        $result = [];

        foreach (self::cases() as $case) {
            $result[strtolower($case->name)] = $case->value;
        }

        return $result;
    }
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function random(): self
    {
        return self::cases()[rand(0, count(self::cases()) - 1)];
    }

    public static function badge($value): string
    {

        foreach (self::cases() as $case) {
            if ($value == $case->value) {
                return "<span class='" . self::badgesArray()[$case->value]['class'] . "'>" . self::badgesArray()[$case->value]['name'] . "</span>";
            }
        }

        return '';
    }

    public static function mapForSelect()
    {
        return collect(self::cases())->map(function ($status) {
            return [
                'value' => $status->value,
                'label' => strtolower($status->name),
            ];
        });
    }

}