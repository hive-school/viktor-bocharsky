<?php

namespace BU\VictorBocharsky\Shooter\Weapon\Automatic;

use BU\VictorBocharsky\Shooter\Weapon\Automatic;

/**
 * Class Ak47
 * @package BU\VictorBocharsky\Shooter\Weapon\Automatic
 */
class Ak47 extends Automatic
{

    /**
     * @var \BU\VictorBocharsky\Shooter\Magazine\Ak47 The magazine of Ak47
     */
    protected $magazine;

    /**
     * @param \BU\VictorBocharsky\Shooter\Magazine\Ak47 $magazine
     */
    function __construct($magazine = null)
    {
        parent::__construct($magazine);
        if (null !== $magazine) {
            $this->setMagazine($magazine);
        }
    }

    /**
     * Set magazine of weapon
     * @param \BU\VictorBocharsky\Shooter\Magazine\Ak47 $magazine
     * @return $this
     */
    public function setMagazine(\BU\VictorBocharsky\Shooter\Magazine\Ak47 $magazine)
    {
        $this->magazine = $magazine;
        return $this;
    }

    /**
     * Get magazine of weapon
     * @return \BU\VictorBocharsky\Shooter\Magazine\Ak47
     */
    public function getMagazine()
    {
        return $this->magazine;
    }

}