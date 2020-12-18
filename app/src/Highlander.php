<?php

namespace Tournament;

use Tournament\Ref\UnitHitPoints;
use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\GreatSword;

class Highlander extends Unit
{
    const TYPE_REGULAR = 'Regular';
    const TYPE_VETERAN = 'Veteran';

    private $unitType;

    public function __construct($type = self::TYPE_REGULAR)
    {
        $this->unitType = $type;
        parent::__construct();
    }

    protected function getStartHitPoints(): int
    {
        return UnitHitPoints::HIGHLANDER;
    }

    protected function applyDamageModifier(int $damage): int
    {
        if ($this->unitType == self::TYPE_VETERAN && $this->isGoesBerserk()) {
            return $damage * 2;
        }
        return $damage;
    }

    private function isGoesBerserk(): bool
    {
        if ($this->hitPoints() < $this->getStartHitPoints() / 100 * 30) {
            return true;
        }
        return false;
    }

    protected function getDefaultWeapon(): BaseWeapon
    {
        return new GreatSword();
    }
}
