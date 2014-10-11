<?php

namespace BU\VictorBocharsky\House;

use BU\VictorBocharsky\House\Room;

class House {
    
    private $roomsNumber;
    
    private $rooms;
    
    
    public function __construct() {
        $this->roomsNumber = 0;
        $this->rooms = array();
    }
    
    
    public function getRoomsNumber() {
    
        return $this->roomsNumber;
    }
    
    public function addRoom(Room $room) {
        $this->rooms[] = $room;
        $this->roomsNumber++;
        
        return $this;
    }
    
}
