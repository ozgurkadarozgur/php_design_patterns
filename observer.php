<?php

abstract class IEvent {

    private static $instances;
    protected $subscribers = [];
    protected $prefix;

    public static function getInstance()
    {
        $class = get_called_class();
        if(!isset(self::$instances[$class])) {        
            self::$instances[$class] = new $class();            
        }
        return self::$instances[$class];
    }

    abstract public function handle();

    public function subscribe(IFinancier $financier)
    {
        array_push($this->subscribers, $financier);
    }

    public static function dispatch(Stock $stock)
    {          
        $_instance = self::getInstance();  
        $_instance->handle();
        foreach($_instance->subscribers as $subscriber) {
            $subscriber->feed($_instance->prefix . "___" . $stock);
        }
        /*
        foreach($this->subscribers as $subscriber) {
            $subscriber->feed($this->prefix. "___" . $stock);
        }
        */ 
    }

}

class StockCreatedEvent extends IEvent {
        
    protected $prefix = "stock_created_event";

    public function handle()
    {
        echo "Stock_Created_Event has fired!\n";
    }

}

class StockUpdatedEvent extends IEvent {
        
    protected $prefix = "stock_updated_event";

    public function handle()
    {
        echo "Stock_Updated_Event has fired!\n";
    }

}

class Stock {

    private $name;
    private $lot;
    
    public function __construct($name, $lot)
    {
        $this->name = $name;
        $this->lot = $lot;
        //StockCreatedEvent::getInstance()->dispatch($this);
        StockCreatedEvent::dispatch($this);
    }

    public function getName() {
        return $this->name;
    }

    public function setName($lot) {
        $this->lot = $lot;
    }

    public function getLot() {
        return $this->lot;
    }

    public function setLot($lot) {
        $this->lot = $lot;
        //StockUpdatedEvent::getInstance()->dispatch($this);        
        StockUpdatedEvent::dispatch($this);
    }

    public function __toString()
    {
        return sprintf("%s hissesinin güncel değeri %.2f\n", $this->name, $this->lot);
    }

}

interface IFinancier {
    public function feed(Stock $stock);
}

class Financier implements IFinancier {

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function feed($data)
    {
        echo sprintf("Financier : %s - %s", $this->name, $data);
    }

}


$f3 = new Financier("gizem");
$created_event = StockCreatedEvent::getInstance();
$created_event->subscribe($f3);


$apple_hisse = new Stock("Apple", 12);

$f1 = new Financier("ozgur");
$f2 = new Financier("baris");


$updated_event = StockUpdatedEvent::getInstance();
$updated_event->subscribe($f1);
$updated_event->subscribe($f2);


$apple_hisse->setLot(15);

$microsoft_hisse = new Stock("Microsoft", 14);
$microsoft_hisse->setLot(8);


$apple_hisse->setLot(19);