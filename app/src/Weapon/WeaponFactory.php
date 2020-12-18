<?php
namespace Tournament\Weapon;

use Tournament\Ref\WeaponType;

class WeaponFactory
{
    public static function create(string $weaponType): ?BaseWeapon
    {
        switch ($weaponType) {
            case WeaponType::ONE_HAND_SWORD:
                return new OneHandSword();
            case WeaponType::ONE_HAND_AXE:
                return new OneHandAxe();
            case WeaponType::GREAT_SWORD:
                return new GreatSword();
            case WeaponType::POISON:
                return new Poison();
        }
        return null;
    }
}
