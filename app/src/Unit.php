<?php
namespace Tournament;

use Tournament\Armor\Armor;
use Tournament\Armor\ArmorFactory;
use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\UnitWeapon;
use Tournament\Weapon\WeaponFactory;

abstract class Unit
{
    protected $hitPoints = 0;
    /** @var Armor */
    private $armor;
    /** @var UnitWeapon */
    protected $weapon;

    public function __construct()
    {
        $this->hitPoints = $this->getStartHitPoints();
        if ($this->hitPoints <= 0) {
            throw new \LogicException("Unit start hitPoints cannot be 0 or less.");
        }
        $this->armor = new Armor();
        $this->weapon = new UnitWeapon();
    }

    public function hitPoints(): int
    {
        return $this->hitPoints;
    }

    public function isDead(): bool
    {
        return $this->hitPoints() == 0;
    }

    public function engage(Unit $enemy)
    {
        while (!($this->isDead() || $enemy->isDead())) {
            $enemy->getHitFrom($this);
            if (!$enemy->isDead()) {
                $this->getHitFrom($enemy);
            }
        }
    }

    public function getBlowStrength(): int
    {
        if ($this->weapon->hasNoWeapons()) {
            $this->weapon->addWeapon($this->getDefaultWeapon());
        }
        $strength = $this->weapon->affectOffence() - $this->armor->affectOffence();
        if ($strength < 0) {
            $strength = 0;
        }
        $strength = $this->applyDamageModifier($strength);
        return $strength;
    }

    public function isDamageArmor(): bool
    {
        return $this->weapon->isDamageArmor();
    }

    public function getHitFrom(Unit $enemy)
    {
        $blowStrength = $this->armor->blockDamage($enemy->getBlowStrength(), $enemy->isDamageArmor());
        if ($blowStrength < 0) {
            $blowStrength = 0;
        }
        $this->hitPoints -= $blowStrength;
        if ($this->hitPoints < 0) {
            $this->hitPoints = 0;
        }
    }

    public function equip(string $type): self
    {
        $armorItem = ArmorFactory::create($type);
        if (!\is_null($armorItem)) {
            $this->armor->addArmor($armorItem);
        } else {
            $weaponItem = WeaponFactory::create($type);
            if (!\is_null($weaponItem)) {
                $this->weapon->addWeapon($weaponItem);
            }
        }
        return $this;
    }

    abstract protected function getStartHitPoints(): int;
    abstract protected function applyDamageModifier(int $damage): int;
    abstract protected function getDefaultWeapon(): BaseWeapon;
}
