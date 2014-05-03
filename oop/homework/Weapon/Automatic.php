<?php

namespace Weapon;

/**
 * Class Automatic
 * @package Weapon
 */
abstract class Automatic extends \Weapon
{

    /**
     * @var \Magazine The magazine of weapon
     */
    protected $magazine;

    function __construct()
    {
    }

    /**
     * Weapon shooting
     * @param bool $single
     * @return $this
     * @throws \Exception
     */
    public function shoot($single = false)
    {
        if ($single === false) {
            while ($cartridge = $this->getMagazine()->getCartridge()) {
                print $cartridge->shoot() ? $this->fire() : $this->misfire();
            }
        } elseif ($single === true) {
            if ($cartridge = $this->getMagazine()->getCartridge()) {
                print $cartridge->shoot() ? $this->fire() : $this->misfire();
            }
        } else {
            throw new \Exception('You need to choose a mode: single or queue.');
        }
        return $this;
    }

    /**
     * Fire sound of automatic
     * @return string
     */
    protected function fire()
    {
        return 'rat-a-tat...' . PHP_EOL;
    }

} 