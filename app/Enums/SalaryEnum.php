<?php

namespace App\Enums;

use App\Interfaces\EnumInterface;

enum SalaryEnum: string implements EnumInterface
{
    case SALARY_RANGE_ONE = '0';
    case SALARY_RANGE_TWO = '1';
    case SALARY_RANGE_THREE = '2';
    case SALARY_RANGE_FOUR = '3';
    case SALARY_RANGE_FIVE = '4';

    public static function toArray(): array
    {
        return [
            self::SALARY_RANGE_ONE     => '0-2000',
            self::SALARY_RANGE_TWO     => '2000-3000',
            self::SALARY_RANGE_THREE   => '3000-4000',
            self::SALARY_RANGE_FOUR    => '4000-5000',
            self::SALARY_RANGE_FIVE    => '5000+',
        ];
    }

    public function description(): string
    {
        return match($this) {
            self::SALARY_RANGE_ONE     => '0-2000',
            self::SALARY_RANGE_TWO     => '2000-3000',
            self::SALARY_RANGE_THREE   => '3000-4000',
            self::SALARY_RANGE_FOUR    => '4000-5000',
            self::SALARY_RANGE_FIVE    => '5000+',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::SALARY_RANGE_ONE     => '',
            self::SALARY_RANGE_TWO     => '',
            self::SALARY_RANGE_THREE   => '',
            self::SALARY_RANGE_FOUR    => '',
            self::SALARY_RANGE_FIVE    => '',
        };
    }
}
