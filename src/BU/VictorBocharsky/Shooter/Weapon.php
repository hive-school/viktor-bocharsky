<?php

namespace BU\VictorBocharsky\Shooter;

use BU\VictorBocharsky\Shooter\Interfaces\Shootable;

/**
 * Class Weapon
 * @package BU\VictorBocharsky\Shooter
 */
abstract class Weapon implements Shootable
{
    function __construct()
    {
    }

    /**
     * Fire sound
     * @return string
     */
    protected function fire()
    {
        return 'bang!' . PHP_EOL;
    }

    /**
     * Misfire sound
     * @return string
     */
    protected function misfire()
    {
        return 'klats...' . PHP_EOL;
    }

} 