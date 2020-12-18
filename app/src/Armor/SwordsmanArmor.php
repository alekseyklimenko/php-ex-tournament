<?php
namespace Tournament\Armor;

class SwordsmanArmor extends BaseArmor
{
    public function blockDamage(int $blowStrength, bool $destructiveBlow = false): int
    {
        return 3;
    }

    public function affectOffence(): int
    {
        return 1;
    }
}
