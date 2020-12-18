<?php
namespace Tournament\Weapon;

use \Tournament\Ref\WeaponsDamage;

class OneHandSword extends BaseWeapon
{
    public function affectOffence(): int
    {
        return WeaponsDamage::ONE_HAND_SWORD;
    }

    public function isDamageArmor(): bool
    {
        return false;
    }
}
