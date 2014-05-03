<?php

/**
 * Class Weapon
 */
abstract class Weapon
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