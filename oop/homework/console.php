<?php

if (PHP_SAPI != 'cli') {
    die('Error occurred! Script work only from console.');
}

// Register the classes autoloader
require_once dirname(__FILE__) . '/Autoloader.php';
Autoloader::register();

// Shooter
$string = ''; // string default value
while ( ! $string) {
    print 'Enter name and surname of shooter: ';
    $string = stream_get_line(STDIN, 255, PHP_EOL); // Get string from console user input
}
$array = explode(' ', $string);
if ( ! isset($array[1])) {
    $array[1] = '';
}
list($name, $surname) = $array;
print $shooter = new \Person\Shooter($name, $surname);

// Weapon & Magazine
$weaponChoose = 0;
while ( ! $weaponChoose) {
    print 'Choose weapon:' . PHP_EOL;
    print '1 - AK-47' . PHP_EOL;
    print '2 - Desert Eagle' . PHP_EOL;
    $weaponChoose = (int)stream_get_line(STDIN, 255, PHP_EOL); // Get string from console user input
    switch ($weaponChoose) {
        case 1:
            $weapon = new \Weapon\Automatic\Ak47();
            $magazine = new \Magazine\Ak47();
            break;

        case 2:
            $weapon = new \Weapon\Handgun\DesertEagle();
            $magazine = new \Magazine\Ak47();
            break;

        default:
            $weaponChoose = 0;
            break;
    }
}
$shooter->setWeapon($weapon);
$shooter->getWeapon()->setMagazine($magazine);

// Cartridges
$numberOfCartridges = 0;
while ( ! $numberOfCartridges) {
    print 'Enter number of cartridges: ';
    $numberOfCartridges = (int)stream_get_line(STDIN, 255, PHP_EOL); // Get string from console user input
    switch ($weaponChoose) {
        case 1:
            $numberOfCartridges = \Magazine\Ak47::MAX_SIZE < $numberOfCartridges
                ? \Magazine\Ak47::MAX_SIZE
                : $numberOfCartridges
            ;
            $cartridges = array();
            for ($i = \Magazine\Ak47::MIN_SIZE; $i < $numberOfCartridges; $i++) {
                $cartridges[] = new \Cartridge\Cartridge762x39(); // ball cartridge
            }
            break;

        case 2:
            $numberOfCartridges = \Magazine\DesertEagle::MAX_SIZE < $numberOfCartridges
                ? \Magazine\DesertEagle::MAX_SIZE
                : $numberOfCartridges
            ;
            $cartridges = array();
            for ($i = \Magazine\DesertEagle::MIN_SIZE; $i < $numberOfCartridges; $i++) {
                $cartridges[] = new \Cartridge\Cartridge127x33(); // ball cartridge
            }
            break;

        default:
            $numberOfCartridges = 0;
            break;
    }
}
$shooter
        ->getWeapon()
        ->getMagazine()
        ->recharge($cartridges)
    ;
$shooter->getWeapon()->shoot();
