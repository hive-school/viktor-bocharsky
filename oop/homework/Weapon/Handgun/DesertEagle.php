<?php

namespace Weapon\Handgun;

/**
 * Class Handgun
 * @package Weapon\Handgun
 */
class DesertEagle extends \Weapon\Handgun
{

    /**
     * @var \Magazine\DesertEagle The magazine of DesertEagle
     */
    protected $magazine;

    /**
     * @param \Magazine\DesertEagle $magazine
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
     * @param \Magazine\DesertEagle $magazine
     * @return $this
     */
    public function setMagazine(\Magazine\DesertEagle $magazine)
    {
        $this->magazine = $magazine;
        return $this;
    }

    /**
     * Get magazine of weapon
     * @return \Magazine\DesertEagle
     */
    public function getMagazine()
    {
        return $this->magazine;
    }

}