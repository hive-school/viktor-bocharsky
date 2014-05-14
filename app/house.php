<?php

use BU\VictorBocharsky\House\House;
use BU\VictorBocharsky\House\Room;

include_once dirname(__FILE__) . '/../src/BU/VictorBocharsky/House/House.php';
include_once dirname(__FILE__) . '/../src/BU/VictorBocharsky/House//Room.php';

$house = new House;

$room1 = new Room(8, 4, 3);
$room2 = new Room(10, 6, 3);
$room3 = new Room(6, 3, 3);

$house
    ->addRoom($room1)
    ->addRoom($room2)
    ->addRoom($room3)
;
    
print 'Number of rooms: '. $house->getRoomsNumber() . PHP_EOL;
print 'Square of 1st room: '. $room1->getSquare() .' m2'. PHP_EOL;
print 'Volume of 1st room: '. $room1->getVolume() .' m3'. PHP_EOL;