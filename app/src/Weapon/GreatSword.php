<?php
namespace Tournament\Weapon;

use \Tournament\Ref\WeaponsDamage;

class GreatSword extends BaseWeapon
{
    const ATTACKS_BEFORE_COOLDOWN = 2;
    protected $attacksBeforeCooldown = self::ATTACKS_BEFORE_COOLDOWN;

    public function affectOffence(): int
    {
        if ($this->canAttack()) {
            return WeaponsDamage::GREAT_SWORD;
        }
        return 0;
    }

    public function isDamageArmor(): bool
    {
        return false;
    }

    private function canAttack()
    {
        if ($this->attacksBeforeCooldown > 0) {
            $this->attacksBeforeCooldown--;
            return true;
        }
        $this->attacksBeforeCooldown = self::ATTACKS_BEFORE_COOLDOWN;
        return false;
    }
}
