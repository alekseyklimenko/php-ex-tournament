<?php
namespace Tournament\Armor;

class Armor extends BaseArmor
{
    /** @var BaseArmor[]  */
    private $armorItems = [];

    public function blockDamage(int $blowStrength, bool $destructiveBlow = false): int
    {
        foreach ($this->armorItems as $item) {
            $blowStrength -= $item->blockDamage($blowStrength, $destructiveBlow);
        }
        return $blowStrength;
    }

    public function affectOffence(): int
    {
        $damageDecrease = 0;
        foreach ($this->armorItems as $item) {
            $damageDecrease += $item->affectOffence();
        }
        return $damageDecrease;
    }

    public function addArmor(BaseArmor $item)
    {
        if (in_array($item, $this->armorItems, true)) {
            return;
        }
        $this->armorItems[] = $item;
    }
}
