<?php

namespace BU\VictorBocharsky\Shooter;

use BU\VictorBocharsky\Shooter\Interfaces\Rechargeable;

/**
 * Class Magazine
 * @package BU\VictorBocharsky\Shooter
 */
abstract class Magazine implements Rechargeable
{

    /**
     * @var array The array of charged cartridges
     */
    protected $cartridges = array();

    /**
     * @var int The count of charged cartridges
     */
    protected $count = 0;

    function __construct(array $cartridges = array())
    {
        $this->recharge($cartridges);
    }

    /**
     * Recharge the cartridge
     * @param array $cartridges
     * @return $this
     */
    abstract public function recharge(array $cartridges = array());

    abstract public function getCartridge();

    /**
     * Count of charged cartridges in magazine
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

}