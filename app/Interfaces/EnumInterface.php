<?php

namespace App\Interfaces;

interface EnumInterface
{
    public static function toArray(): array;
    public function description(): string;
    public function color(): string;
}
