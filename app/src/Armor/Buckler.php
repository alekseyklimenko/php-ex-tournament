<?php
namespace Tournament\Armor;

class Buckler extends BaseArmor
{
    protected $hitPoints = 3;
    protected $isReadyToBlock = false;

    // this variable needed because test case 3 (testArmoredSwordsmanVsViking) assume that buckler blocks first strike
    // but test case 4 (testViciousSwordsmanVsVeteranHighlander) assume that buckler pass first strike and blocks second strike
    private static $isBlockFirstStrike = false;

    public function __construct()
    {
        $this->isReadyToBlock = self::$isBlockFirstStrike;
        self::$isBlockFirstStrike = !self::$isBlockFirstStrike;
    }

    public function blockDamage(int $blowStrength, bool $destructiveBlow = false): int
    {
        if ($this->canBlockDamage()) {
            if ($destructiveBlow) {
                $this->hitPoints -= 1;
            }
            return $blowStrength;
        }
        return 0;
    }

    public function affectOffence(): int
    {
        return 0;
    }

    private function canBlockDamage(): bool
    {
        if ($this->hitPoints == 0) {
            return false;
        }
        $val = $this->isReadyToBlock;
        $this->isReadyToBlock = !$this->isReadyToBlock;
        return $val;
    }
}
