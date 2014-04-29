<?php

class Room {

    private $lenght;
    
    private $breadth;
    
    private $height;
    
    private $square;
    
    private $volume;


    public function __construct($lenght = 0, $breadth = 0, $height = 0) {
        $this->square = 0;
        $this->volume = 0;
        $this->setLength($lenght);
        $this->setBreadth($breadth);
        $this->setHeight($height);
    }
    
    
    public function recalculateSquare() {
        $this->square = $this->lenght * $this->breadth;
        
        return $this;
    }
    
    public function recalculateVolume() {
        $this->volume = $this->lenght * $this->breadth * $this->height;
        
        return $this;
    }
    
    public function getSquare() {
    
        return $this->square;
    }
    
    public function getVolume() {
        
        return $this->volume;
    }
    
    public function setLength($lenght) {
        $this->lenght = $lenght > 0 ? $lenght : 0;
        $this->recalculateSquare();
        $this->recalculateVolume();
        
        return $this;
    }
    
    public function getLength() {
        
        return $this->lenght;
    }
    
    public function setBreadth($breadth) {
        $this->breadth = $breadth > 0 ? $breadth : 0;
        $this->recalculateSquare();
        $this->recalculateVolume();
        
        return $this;
    }
    
    public function getBreadth() {
        
        return $this->breadth;
    }
    
    public function setHeight($height) {
        $this->height = $height > 0 ? $height : 0;
        $this->recalculateSquare();
        $this->recalculateVolume();
        
        return $this;
    }
    
    public function getHeight() {
        
        return $this->height;
    }
    
}
