<?php

// Register the classes autoloader
require_once dirname(__FILE__) . '/Autoloader.php';
Autoloader::register();

print $shooter = new \Person\Shooter('John', 'Rambo');

print PHP_EOL . 'Use AK-47' . PHP_EOL;
$ak47 = new \Weapon\Automatic\Ak47();
$shooter->setWeapon($ak47);

print 'First magazine: ' . PHP_EOL;
$cartridges = array();
for ($i = \Magazine\Ak47::MIN_SIZE; $i < \Magazine\Ak47::MAX_SIZE; $i++) {
    $cartridges[] = new \Cartridge\Cartridge762x39(); // ball cartridge
}
$ak47Mag = new \Magazine\Ak47($cartridges);

$shooter
        ->getWeapon()
        ->setMagazine($ak47Mag)
        ->shoot()
    ;

print 'Second magazine: ' . PHP_EOL;
$shooter->getWeapon()->getMagazine()->recharge(array(
    new \Cartridge\Cartridge762x39(), // ball cartridge
    new \Cartridge\Cartridge762x39(true), // empty cartridge
    new \Cartridge\Cartridge762x39(),
    new \Cartridge\Cartridge762x39(),
    new \Cartridge\Cartridge762x39(),
));
$shooter->getWeapon()
        ->shoot(true)
        ->shoot(true)
        ->shoot(true)
        ->shoot(true)
        ->shoot(true)
    ;

print PHP_EOL . 'Use Desert Eagle' . PHP_EOL;
$desert = new Weapon\Handgun\DesertEagle();
$shooter->setWeapon($desert);

print 'First magazine: ' . PHP_EOL;
$desertMag = new \Magazine\DesertEagle(array(
    new \Cartridge\Cartridge127x33(),
    new \Cartridge\Cartridge127x33(),
    new \Cartridge\Cartridge127x33(),
));

$shooter
        ->getWeapon()
        ->setMagazine($desertMag)
        ->shoot()
        ->shoot()
        ->shoot()
    ;