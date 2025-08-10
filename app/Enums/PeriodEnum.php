<?php

namespace App\Enums;

use App\Interfaces\EnumInterface;

enum PeriodEnum: string implements EnumInterface
{
    case FULL_TIME = 'full-time';
    case PART_TIME   = 'part-time';
    case TEMPORARY   = 'temporario';
    case CONTRACT   = 'contrato';
    case FREELANCE   = 'freelance';

    public static function toArray(): array
    {
        return [
            self::PART_TIME => 'Part-time',
            self::FULL_TIME => 'Full-time',
            self::TEMPORARY => 'Temporário',
            self::CONTRACT  => 'Contrato',
            self::FREELANCE => 'Freelance',
        ];
    }

    public function description(): string
    {
        return match($this) {
            self::PART_TIME => 'Part-time',
            self::FULL_TIME => 'Full-time',
            self::TEMPORARY => 'Temporário',
            self::CONTRACT  => 'Contrato',
            self::FREELANCE => 'Freelance',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::PART_TIME     => '',
            self::FULL_TIME     => '',
            self::TEMPORARY     => '',
            self::CONTRACT      => '',
            self::FREELANCE     => '',
        };
    }
}
