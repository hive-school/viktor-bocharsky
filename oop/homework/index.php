<?php

// Register the classes autoloader
require_once dirname(__FILE__) . '/Autoloader.php';
Autoloader::register();

print $shooter = new \Person\Shooter('John', 'Rambo');

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
$shooter->getWeapon()->shoot();