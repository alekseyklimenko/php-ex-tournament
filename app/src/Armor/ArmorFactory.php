<?php
namespace Tournament\Armor;

use Tournament\Ref\ArmorType;

class ArmorFactory
{
    public static function create(string $armorType): ?BaseArmor
    {
        switch($armorType) {
            case ArmorType::BUKLER:
                return new Buckler();
            case ArmorType::SWORDSMAN_ARMOR:
                return new SwordsmanArmor();
        }
        return null;
    }
}
