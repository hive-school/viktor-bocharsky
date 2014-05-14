<?php

namespace BU\VictorBocharsky\Shooter\Magazine;

use BU\VictorBocharsky\Shooter\Magazine;
use BU\VictorBocharsky\Shooter\Cartridge\Cartridge762x39;

/**
 * Class Ak47
 * @package BU\VictorBocharsky\Shooter\Magazine
 */
class Ak47 extends Magazine
{

    /**
     * The min magazine count
     */
    const MIN_SIZE = 0;

    /**
     * The max magazine count
     */
    const MAX_SIZE = 30;


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
     * @return Cartridge762x39
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
     * @param Cartridge762x39 $cartridge
     * @return $this
     */
    public function addCartridges(Cartridge762x39 $cartridge)
    {
        if ($this->count < self::MAX_SIZE) {
            $this->cartridges[] = $cartridge;
            $this->count++;
        }
        return $this;
    }

}