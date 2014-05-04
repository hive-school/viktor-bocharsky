<?php

/**
 * Class Cartridge
 */
abstract class Cartridge implements \Interfaces\Shootable
{

    /**
     * @var bool The empty cartridge flag
     */
    private $empty = false;

    /**
     * @var bool The defected cartridge flag
     */
    private $defect = false;

    /**
     * @param bool $empty
     */
    public function __construct($empty = false)
    {
        $this->setEmpty($empty); // cartridge is empty if true
        $this->setDefect(7 == mt_rand(0, 100)); // cartridge is defect if true
    }

    /**
     * Shooting cartridge
     * @return bool
     */
    public function shoot()
    {
        $shot = !$this->empty && !$this->defect;
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