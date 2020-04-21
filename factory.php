<?php

interface Phone {

    public function getModel() : string;

    public function getBattery() : string;

}

class S8 implements Phone {

    private $model;
    private $battery;

    public function __construct(string $model, string $battery)
    {
        $this->model = $model;
        $this->battery = $battery;
    }

    public function getModel() : string {
        return $this->model;
    }

    public function getBattery(): string
    {
        return $this->battery;
    }

    public function __toString()
    {
        return sprintf("S8 [Model: %s, Battery: %s]\n", $this->model, $this->battery);
    }

}

class Note8 implements Phone {

    private $model;
    private $battery;

    public function __construct(string $model, string $battery)
    {
        $this->model = $model;
        $this->battery = $battery;
    }

    public function getModel() : string {
        return $this->model;
    }

    public function getBattery(): string
    {
        return $this->battery;
    }

    public function __toString()
    {
        return sprintf("Note8 [Model: %s, Battery: %s]\n", $this->model, $this->battery);
    }

}

class Samsung {

    public static function getPhone(string $model, string $battery) : Phone
    {

        $phone = null;
        switch ($model) {
            case 's8':
                $phone = new S8($model, $battery);
                break;
            case 'note8': 
                $phone = new Note8($model, $battery);
                break;
            default:
                throw new Exception("invalid phone model");
                break;
        }

        return $phone;
    }


    // my way
    public static function createPhone($class)
    {
        $phone = null;
        switch ($class) {
            case 'S8':
                $phone = new S8('s8', '2800mah');
                break;
            case 'Note8': 
                $phone = new Note8('note8', '4800mah');
                break;
            default:
                throw new Exception("invalid phone model");
                break;
        }

        return $phone;
    }

}

$s8 = Samsung::createPhone(S8::class);
echo $s8;

$note8 = Samsung::createPhone(Note8::class);
echo $note8;



/*
$s8 = Samsung::getPhone("s8", "2600mah");
echo $s8;

$note8 = Samsung::getPhone("note8", "3600mah");
echo $note8;
*/