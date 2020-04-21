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

interface PhoneFactory{
    public function getPhone(string $model, string $battery) : Phone;
}

class S8Factory implements PhoneFactory {

    public function getPhone(string $model, string $battery) : S8
    {
        return new S8($model, $battery);
    }

}

class Note8Factory implements PhoneFactory {

    public function getPhone(string $model, string $battery) : Note8
    {
        return new Note8($model, $battery);
    }

}

$s8_factory = new S8Factory();
$s8 = $s8_factory->getPhone('s8', '2800mah');
echo $s8;

$note8_factory = new Note8Factory();
$note8 = $note8_factory->getPhone('note8', '3800mah');
echo $note8;