<?php

namespace Weapon\Automatic;

/**
 * Class Ak47
 */
class Ak47 extends \Weapon\Automatic
{

    /**
     * @var \Magazine\Ak47 The cage of weapon
     */
    private $magazine;

    function __construct($magazine = null)
    {
        if (null !== $magazine) {
            $this->setMagazine($magazine);
        }
    }

    /**
     * Weapon shooting
     * @param bool $single
     * @return $this
     * @throws \Exception
     */
    public function shoot($single = false) {
        if ($single === false) {
            while ($cartridge = $this->getMagazine()->getCartridge()) {
                print $cartridge->shoot() ? $this->fire() : $this->misfire();
            }
        } elseif ($single === true) {
            if ($cartridge = $this->getMagazine()->getCartridge()) {
                print $cartridge->shoot() ? $this->fire() : $this->misfire();
            }
        } else {
            throw new \Exception('You need to choose a mode: single or queue.');
        }
        return $this;
    }

    /**
     * Fire sound
     * @return string
     */
    private function fire() {
        return 'rat-a-tat...' . PHP_EOL;
    }

    /**
     * Misfire sound
     * @return string
     */
    private function misfire() {
        return 'klats...' . PHP_EOL;
    }

    /**
     * Set magazine of weapon
     * @param \Magazine\Ak47 $magazine
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