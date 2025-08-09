<?php

namespace App\Interfaces;
use BackedEnum;

interface EnumInterface extends BackedEnum
{
    public static function toArray(): array;
    public function description(): string;
    public function color(): string;
}
