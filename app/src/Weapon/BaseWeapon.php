<?php
namespace Tournament\Weapon;

abstract class BaseWeapon
{
    abstract public function affectOffence(): int;
    abstract public function isDamageArmor(): bool;

    public function addWeapon(BaseWeapon $weapon)
    {
        throw new WeaponException(get_class($this) . "is class-element and cannot call addWeapon()");
    }
}
