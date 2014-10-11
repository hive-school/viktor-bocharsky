<?php

namespace BU\VictorBocharsky\House\Tests;

use BU\VictorBocharsky\House\Room;

class RoomTest extends \PHPUnit_Framework_TestCase {
    
    public function testSetGetHeight() {
        $room = new Room();
        $height = 3;
        $room->setHeight($height);
        $this->assertEquals($height, $room->getHeight());
    }

}
