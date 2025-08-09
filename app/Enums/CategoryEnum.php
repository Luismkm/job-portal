<?php

namespace App\Enums;

use App\Interfaces\EnumInterface;

enum CategoryEnum: string implements EnumInterface
{
    case COMMERCE = 'comercio';
    case CONSTRUCTION   = 'contrucao';

    public static function toArray(): array
    {
        return [
            self::COMMERCE => 'Comércio',
            self::CONSTRUCTION   => 'Construção',
        ];
    }

    public function description(): string
    {
        return match($this) {
            self::COMMERCE => 'Comércio',
            self::CONSTRUCTION   => 'Construção',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::COMMERCE               => '',
            self::CONSTRUCTION           => '',
        };
    }
}
