<?php
namespace Tournament;

use Tournament\Ref\UnitHitPoints;
use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\OneHandSword;
use Tournament\Weapon\Poison;

class Swordsman extends Unit
{
    const TYPE_REGULAR = 'Regular';
    const TYPE_VICIOUS = 'Vicious';

    public function __construct($type = self::TYPE_REGULAR)
    {
        parent::__construct();
        if ($type == self::TYPE_VICIOUS) {
            $this->weapon->addWeapon(new Poison());
        }
    }

    protected function getStartHitPoints(): int
    {
        return UnitHitPoints::SWORDSMAN;
    }

    protected function applyDamageModifier(int $damage): int
    {
        return $damage;
    }

    protected function getDefaultWeapon(): BaseWeapon
    {
        return new OneHandSword();
    }
}
