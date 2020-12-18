<?php
namespace Tournament\Weapon;

class UnitWeapon extends BaseWeapon
{
    /** @var BaseWeapon[] */
    private $weaponItems = [];

    public function affectOffence(): int
    {
        $damage = 0;
        foreach ($this->weaponItems as $item) {
            $damage += $item->affectOffence();
        }
        return $damage;
    }

    public function isDamageArmor(): bool
    {
        foreach ($this->weaponItems as $item) {
            if ($item->isDamageArmor()) {
                return true;
            }
        }
        return false;
    }

    public function addWeapon(BaseWeapon $weapon)
    {
        if (in_array($weapon, $this->weaponItems, true)) {
            return;
        }
        $this->weaponItems[] = $weapon;
    }

    public function hasNoWeapons(): bool
    {
        return count($this->weaponItems) == 0;
    }
}
