<?php

namespace Magazine;

use Cartridge\Cartridge127x33;

/**
 * Class Ak47
 * @package Magazine
 */
class DesertEagle extends \Magazine
{

    /**
     * The min magazine count
     */
    const MIN_SIZE = 0;

    /**
     * The max magazine count
     */
    const MAX_SIZE = 7;

    function __construct(array $cartridges = array())
    {
        $this->recharge($cartridges);
    }

    /**
     * Recharge the cartridge
     * @param array $cartridges
     * @return $this
     */
    public function recharge(array $cartridges = array())
    {
        foreach ($cartridges as $cartridge) {
            $this->addCartridges($cartridge);
        }
        return $this;
    }

    /**
     * Get current cartridge from magazine
     * @return Cartridge127x33
     */
    public function getCartridge()
    {
        $cartridge = null;
        if ($this->count > self::MIN_SIZE) {
            $cartridge = array_pop($this->cartridges);
            $this->count--;
        }
        return $cartridge;
    }

    /**
     * Add new cartridge to magazine
     * @param Cartridge127x33 $cartridge
     * @return $this
     */
    public function addCartridges(Cartridge127x33 $cartridge)
    {
        if ($this->count < self::MAX_SIZE) {
            $this->cartridges[] = $cartridge;
            $this->count++;
        }
        return $this;
    }

}