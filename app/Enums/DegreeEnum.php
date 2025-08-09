<?php

namespace App\Enums;

use App\Interfaces\EnumInterface;

enum DegreeEnum: string implements EnumInterface
{
    case NOT_INFORMED = 'nao_informado';
    case HIGH_SCHOOL   = 'ensino_medio';
    case HIGHER_EDUCATION   = 'ensino_superior';
    case MASTER_DEGREE   = 'mestrado';
    case DOCTORATE   = 'doutorado';

    public static function toArray(): array
    {
        return [
            self::NOT_INFORMED => 'Não informado',
            self::HIGH_SCHOOL   => 'Ensino médio',
            self::HIGHER_EDUCATION   => 'Ensino superior',
            self::MASTER_DEGREE   => 'Mestrado',
            self::DOCTORATE   => 'Doutorado',
        ];
    }

    public function description(): string
    {
        return match($this) {
            self::NOT_INFORMED        => 'Não informado',
            self::HIGH_SCHOOL         => 'Ensino médio',
            self::HIGHER_EDUCATION    => 'Ensino superior',
            self::MASTER_DEGREE       => 'Mestrado',
            self::DOCTORATE           => 'Doutorado',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::NOT_INFORMED       => '',
            self::HIGH_SCHOOL        => '',
            self::HIGHER_EDUCATION   => '',
            self::MASTER_DEGREE      => '',
            self::DOCTORATE          => '',
        };
    }
}
