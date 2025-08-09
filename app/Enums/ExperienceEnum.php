<?php

namespace App\Enums;

use App\Interfaces\EnumInterface;

enum ExperienceEnum: string implements EnumInterface
{
    case NO_EXPERIENCE = '0';
    case MORE_THAN_A_YEAR   = '1';
    case MORE_THAN_TWO_YEAR   = '2';
    case MORE_THAN_THREE_YEAR   = '3';
    case MORE_THAN_FOUR_YEAR   = '4';
    case MORE_THAN_FIVE_YEAR   = '5';

    public static function toArray(): array
    {
        return [
            self::NO_EXPERIENCE => 'Sem experiência',
            self::MORE_THAN_A_YEAR   => 'Mais de 1 ano',
            self::MORE_THAN_TWO_YEAR   => 'Mais de 2 anos',
            self::MORE_THAN_THREE_YEAR   => 'Mais de 3 anos',
            self::MORE_THAN_FOUR_YEAR   => 'Mais de 4 anos',
            self::MORE_THAN_FIVE_YEAR   => 'Mais de 5 anos',
        ];
    }

    public function description(): string
    {
        return match($this) {
            self::NO_EXPERIENCE => 'Sem experiencia',
            self::MORE_THAN_A_YEAR   => 'Mais de 1 ano',
            self::MORE_THAN_TWO_YEAR   => 'Mais de 2 anos',
            self::MORE_THAN_THREE_YEAR   => 'Mais de 3 anos',
            self::MORE_THAN_FOUR_YEAR   => 'Mais de 4 anos',
            self::MORE_THAN_FIVE_YEAR   => 'Mais de 5 anos',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::NO_EXPERIENCE                => '',
            self::MORE_THAN_A_YEAR             => '',
            self::MORE_THAN_TWO_YEAR           => '',
            self::MORE_THAN_THREE_YEAR         => '',
            self::MORE_THAN_FOUR_YEAR          => '',
            self::MORE_THAN_FIVE_YEAR          => '',
        };
    }
}
