<?php

namespace Person;

/**
 * Class Shooter
 * @package \Person
 */
class Shooter extends \Person
{

    /**
     * @var float The precision of shooter
     */
    private $precision;

    /**
     * @var \Weapon The weapon of shooter
     */
    private $weapon;

    public function __construct($name = '', $surname = '')
    {
        parent::__construct($name, $surname);
        $this->setPrecision(0.89);
    }

    function __toString()
    {
        return ''
                . parent::__toString()
                . ' - Precision: '
                . $this->getPrecision() * 100
                . '%'
                . PHP_EOL
            ;
    }

    /**
     * @return float
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * @param float $precision
     */
    public function setPrecision($precision)
    {
        $this->precision = (float)$precision;
    }

    /**
     * @return \Weapon
     */
    public function getWeapon()
    {
        return $this->weapon;
    }

    /**
     * @param \Weapon $weapon
     */
    public function setWeapon(\Weapon $weapon = null)
    {
        $this->weapon = $weapon;
    }

}