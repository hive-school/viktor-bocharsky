<?php

namespace BU\VictorBocharsky\Shooter\Weapon\Handgun;

use BU\VictorBocharsky\Shooter\Weapon\Handgun;

/**
 * Class DesertEagle
 * @package BU\VictorBocharsky\Shooter\Weapon\Handgun
 */
class DesertEagle extends Handgun
{

    /**
     * @var \BU\VictorBocharsky\Shooter\Magazine\DesertEagle The magazine of DesertEagle
     */
    protected $magazine;

    /**
     * @param \BU\VictorBocharsky\Shooter\Magazine\DesertEagle $magazine
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
     * @param \BU\VictorBocharsky\Shooter\Magazine\DesertEagle $magazine
     * @return $this
     */
    public function setMagazine(\BU\VictorBocharsky\Shooter\Magazine\DesertEagle $magazine)
    {
        $this->magazine = $magazine;
        return $this;
    }

    /**
     * Get magazine of weapon
     * @return \BU\VictorBocharsky\Shooter\Magazine\DesertEagle
     */
    public function getMagazine()
    {
        return $this->magazine;
    }

}