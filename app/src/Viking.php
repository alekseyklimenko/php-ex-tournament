<?php
namespace Tournament;

use Tournament\Ref\UnitHitPoints;
use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\OneHandAxe;

class Viking extends Unit
{
    protected function getStartHitPoints(): int
    {
        return UnitHitPoints::VIKING;
    }

    protected function applyDamageModifier(int $damage): int
    {
        return $damage;
    }

    protected function getDefaultWeapon(): BaseWeapon
    {
        return new OneHandAxe();
    }
}
