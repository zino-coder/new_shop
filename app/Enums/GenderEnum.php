<?php declare(strict_types=1);

namespace App\Enums;

Enum GenderEnum
{
    const MALE = 'Male';
    const FEMALE = 'Female';
    const OTHER = 'Other';

    public static function genderArr()
    {
        return [
            1 => self::MALE,
            2 => self::FEMALE,
            3 => self::OTHER,
        ];
    }

    public static function getGenderByIndex($index)
    {
        return self::genderArr($index);
    }
}
