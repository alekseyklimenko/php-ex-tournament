<?php
namespace Tournament\Weapon;

use \Tournament\Ref\WeaponsDamage;

class OneHandAxe extends BaseWeapon
{
    public function affectOffence(): int
    {
        return WeaponsDamage::ONE_HAND_AXE;
    }

    public function isDamageArmor(): bool
    {
        return true;
    }
}
