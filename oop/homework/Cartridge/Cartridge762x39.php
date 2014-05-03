<?php

namespace Cartridge;

/**
 * Class Cartridge762x39 - The cartridge 7.62 x 39mm for AK-47
 * @package Cartridge
 */
class Cartridge762x39 extends \Cartridge {

    /**
     * @var bool
     */
    private $empty = false;

    /**
     * @var bool
     */
    private $defect = false;

    public function __construct($empty = false)
    {
        $this->setEmpty($empty); // cartridge is empty if true
        $this->setDefect(7 == rand(0,100)); // cartridge is defect if true
    }

    /**
     * Shooting cartridge
     * @return bool
     */
    public function shoot()
    {
        $shot = ! $this->empty && ! $this->defect ;
        $this->empty = true;

        return $shot;
    }

    /**
     * Whether cartridge is empty or no
     * @return bool
     */
    public function isEmpty()
    {
        return $this->empty;
    }

    /**
     * Make cartridge empty
     * @param boolean $empty
     */
    public function setEmpty($empty)
    {
        $this->empty = (boolean)$empty;
    }

    /**
     * Whether cartridge is defect or no
     * @return boolean
     */
    public function isDefect()
    {
        return $this->defect;
    }

    /**
     * Make cartridge defective
     * @param boolean $defect
     */
    public function setDefect($defect)
    {
        $this->defect = (boolean)$defect;
    }

}