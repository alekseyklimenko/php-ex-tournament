<?php
namespace Tournament\Weapon;

use \Tournament\Ref\WeaponsDamage;

class Poison extends BaseWeapon
{
    const ATTACK_CHARGES = 2;
    protected $attacksLeft = self::ATTACK_CHARGES;

    public function affectOffence(): int
    {
        if ($this->canAttack()) {
            return WeaponsDamage::POISON;
        }
        return 0;
    }

    public function isDamageArmor(): bool
    {
        return false;
    }

    private function canAttack()
    {
        if ($this->attacksLeft > 0) {
            $this->attacksLeft--;
            return true;
        }
        return false;
    }
}
