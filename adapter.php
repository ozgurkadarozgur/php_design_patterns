<?php

class Priz {

    public function elektrik_ver(EvAleti $evAleti)
    {
        $evAleti->prize_tak();
    }

}

interface EvAleti {

    public function prize_tak();
    
}

class Televizyon implements EvAleti {

    private $volt = 220;

    public function prize_tak()
    {
        echo sprintf("Televizyon %s volt ile calisiyor.\n", $this->volt);
    }

}

class Utu implements EvAleti {

    private $volt = 220;

    public function prize_tak()
    {
        echo sprintf("Utu %s volt ile calisiyor.\n", $this->volt);
    }

}


class Telefon {

    private $volt = 5;

    public function sarj_et()
    {
        echo sprintf("Telefon %s volt ile sarj ediliyor.\n", $this->volt);
    }

}

class TelefonAdapter implements EvAleti {
 
    private $telefon;

    public function __construct(Telefon $telefon)
    {
        $this->telefon = $telefon;
    }

    public function prize_tak()
    {
        $this->telefon->sarj_et();
    }

}





$priz = new Priz();

$tv = new Televizyon();

$utu = new Utu();

$telefon = new Telefon();

$priz->elektrik_ver($tv);
$priz->elektrik_ver($utu);

$adapter = new TelefonAdapter($telefon);

$priz->elektrik_ver($adapter);
