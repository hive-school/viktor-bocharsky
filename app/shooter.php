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
require_once dirname(__FILE__) . '/../src/BU/VictorBocharsky/Shooter/Autoloader.php';
Autoloader::register();

print $shooter = new Shooter('John', 'Rambo');

print PHP_EOL . 'Use AK-47' . PHP_EOL;
$ak47 = new Ak47();
$shooter->setWeapon($ak47);

print 'First magazine: ' . PHP_EOL;
$cartridges = array();
for ($i = Ak47Mag::MIN_SIZE; $i < Ak47Mag::MAX_SIZE; $i++) {
    $cartridges[] = new Cartridge762x39(); // ball cartridge
}
$ak47Mag = new Ak47Mag($cartridges);

$shooter
    ->getWeapon()
    ->setMagazine($ak47Mag)
    ->shoot()
;

print 'Second magazine: ' . PHP_EOL;
$shooter->getWeapon()->getMagazine()->recharge(array(
    new Cartridge762x39(), // ball cartridge
    new Cartridge762x39(true), // empty cartridge
    new Cartridge762x39(),
    new Cartridge762x39(),
    new Cartridge762x39(),
));
$shooter->getWeapon()
    ->shoot(true)
    ->shoot(true)
    ->shoot(true)
    ->shoot(true)
    ->shoot(true)
;

print PHP_EOL . 'Use Desert Eagle' . PHP_EOL;
$desert = new DesertEagle();
$shooter->setWeapon($desert);

print 'First magazine: ' . PHP_EOL;
$desertMag = new DesertEagleMag(array(
    new Cartridge127x33(),
    new Cartridge127x33(),
    new Cartridge127x33(),
));

$shooter
    ->getWeapon()
    ->setMagazine($desertMag)
    ->shoot()
    ->shoot()
    ->shoot()
;