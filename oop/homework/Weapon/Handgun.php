<?php

namespace Weapon;

/**
 * Class Handgun
 * @package Weapon
 */
abstract class Handgun extends \Weapon
{

    /**
     * @var \Magazine The magazine of weapon
     */
    protected $magazine;

    function __construct()
    {
    }

    /**
     * @return $this
     */
    public function shoot()
    {
        if ($cartridge = $this->getMagazine()->getCartridge()) {
            print $cartridge->shoot() ? $this->fire() : $this->misfire();
        }
        return $this;
    }

} 