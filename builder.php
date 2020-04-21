<?php

class Home {
    private $city;
    private $district;
    private $year;
    private $room_count;
    private $hasPark;
    private $hasClima;

    public function setCity(?string $city) {
        $this->city = $city;        
    }

    public function setDistrict(?string $district) {
        $this->district = $district;        
    }

    public function setYear(?int $year) {
        $this->year = $year;        
    }

    public function setRoomCount(?int $room_count) {
        $this->room_count = $room_count;        
    }

    public function setHasPark(?bool $hasPark) {
        $this->hasPark = $hasPark;        
    }

    public function hasClima(?bool $hasClima) {
        $this->hasClima = $hasClima;   
    }

}

class HomeBuilder {

    private $city;
    private $district;
    private $year;
    private $room_count;
    private $hasPark;
    private $hasClima;


    public static function newBuilder() : HomeBuilder
    {
        return new HomeBuilder();
    }

    public function build() : Home
    {
        $home = new Home();
        
        $home->setCity($this->city);
        $home->setDistrict($this->district);
        $home->setYear($this->year);
        $home->setRoomCount($this->room_count);
        $home->setHasPark($this->hasPark);
        $home->hasClima($this->hasClima);

        return $home;
    }


    public function setCity(?string $city) : HomeBuilder {
        $this->city = $city;
        return $this;
    }

    public function setDistrict(?string $district) : HomeBuilder {
        $this->district = $district;
        return $this;
    }

    public function setYear(?int $year) : HomeBuilder {
        $this->year = $year;
        return $this;
    }

    public function setRoomCount(?int $room_count) : HomeBuilder {
        $this->room_count = $room_count;
        return $this;
    }

    public function setHasPark(?bool $hasPark) : HomeBuilder {
        $this->hasPark = $hasPark;
        return $this;
    }

    public function hasClima(?bool $hasClima) : HomeBuilder {
        $this->hasClima = $hasClima;
        return $this;
    }

}

$home = HomeBuilder::newBuilder()
                    ->setCity("Adana")
                    ->setDistrict("Seyhan")
                    ->setHasPark(true)
                    ->build();
                    
var_dump($home);