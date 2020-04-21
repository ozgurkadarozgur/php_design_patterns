<?php

class Singleton {

    private static $instance;

    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function print()
    {
        echo "hi, i am singleton!", PHP_EOL;
    }

}

$singleton = Singleton::getInstance();
$singleton->print();