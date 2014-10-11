<?php

use BU\VictorBocharsky\Shooter\Autoloader;
use BU\VictorBocharsky\Shooter\Person\Shooter;
use BU\VictorBocharsky\Shooter\Weapon\Automatic\Ak47;
use BU\VictorBocharsky\Shooter\Weapon\Handgun\DesertEagle;
use BU\VictorBocharsky\Shooter\Magazine\Ak47 as Ak47Mag;
use BU\VictorBocharsky\Shooter\Magazine\DesertEagle as DesertEagleMag;
use BU\VictorBocharsky\Shooter\Cartridge\Cartridge127x33;
use BU\VictorBocharsky\Shooter\Cartridge\Cartridge762x39;

// Register the classes autoloader
//require_once dirname(__FILE__) . '/../src/BU/VictorBocharsky/Shooter/Autoloader.php';
//Autoloader::register();
require_once __DIR__ . '/../vendor/autoload.php'; // Register Composer autoloader

if (PHP_SAPI != 'cli') {
    die('Error occurred! Script work only from console.');
}

if ( ! defined('STDIN')) {
    die('Error occurred! Constant "STDIN" not defined. Are you really run this script from console?');
}

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
print $shooter = new Shooter($name, $surname);

// Weapon & Magazine
$weaponChoose = 0;
while ( ! $weaponChoose) {
    print 'Choose weapon:' . PHP_EOL;
    print '1 - AK-47' . PHP_EOL;
    print '2 - Desert Eagle' . PHP_EOL;
    $weaponChoose = (int)stream_get_line(STDIN, 255, PHP_EOL); // Get string from console user input
    switch ($weaponChoose) {
        case 1:
            $weapon = new Ak47();
            $magazine = new Ak47Mag();
            break;

        case 2:
            $weapon = new DesertEagle();
            $magazine = new DesertEagleMag();
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
            $numberOfCartridges = Ak47Mag::MAX_SIZE < $numberOfCartridges
                ? Ak47Mag::MAX_SIZE
                : $numberOfCartridges
            ;
            $cartridges = array();
            for ($i = Ak47Mag::MIN_SIZE; $i < $numberOfCartridges; $i++) {
                $cartridges[] = new Cartridge762x39(); // ball cartridge
            }
            break;

        case 2:
            $numberOfCartridges = DesertEagleMag::MAX_SIZE < $numberOfCartridges
                ? DesertEagleMag::MAX_SIZE
                : $numberOfCartridges
            ;
            $cartridges = array();
            for ($i = DesertEagleMag::MIN_SIZE; $i < $numberOfCartridges; $i++) {
                $cartridges[] = new Cartridge127x33(); // ball cartridge
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
