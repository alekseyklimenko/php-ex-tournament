<?php
namespace Tournament\Armor;

abstract class BaseArmor
{
    abstract public function blockDamage(int $blowStrength, bool $destructiveBlow = false): int;
    abstract public function affectOffence(): int;

    public function addArmor(BaseArmor $armor)
    {
        throw new ArmorException(get_class($this) . "is class-element and cannot call addArmor()");
    }
}
