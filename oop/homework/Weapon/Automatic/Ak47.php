<?php

namespace Weapon\Automatic;

/**
 * Class Ak47
 * @package Weapon\Automatic
 */
class Ak47 extends \Weapon\Automatic
{

    /**
     * @var \Magazine\Ak47 The magazine of Ak47
     */
    protected $magazine;

    /**
     * @param \Magazine\Ak47 $magazine
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
     * @param \Magazine\Ak47 $magazine
     * @return $this
     */
    public function setMagazine(\Magazine\Ak47 $magazine)
    {
        $this->magazine = $magazine;
        return $this;
    }

    /**
     * Get magazine of weapon
     * @return \Magazine\Ak47
     */
    public function getMagazine()
    {
        return $this->magazine;
    }

}