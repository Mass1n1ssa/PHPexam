<?php


class Personnage {
    public $nom;
    public $pouvoir;
    public $hp;

    public function __construct($nom, $pouvoir, $hp) {
        $this->nom = $nom;
        $this->pouvoir = $pouvoir;
        $this->hp = $hp;
    }

    public function afficher_info(){
        echo "Nom : " . $this->nom . "\n";
        echo "Pouvoir : " . $this->pouvoir . "\n";
        echo "Points de vie (HP) : " . $this->hp . "\n";
    }
}

class Hero extends Personnage { 
    public $avantage;

    public function __construct($nom, $pouvoir, $hp, $avantage) { 
        parent::__construct($nom, $pouvoir, $hp); 
        $this->avantage = $avantage;
    }

    public function afficher_info(){
        parent::afficher_info(); 
        echo "Special : " . $this->avantage . "\n";
    }
}

class Vilain extends Personnage { 
    public $destruction;

    public function __construct($nom, $pouvoir, $hp, $destruction) { 
        parent::__construct($nom, $pouvoir, $hp); 
        $this->destruction = $destruction;
    }

    public function afficher_info(){
        parent::afficher_info(); 
        echo "Special : " . $this->destruction . "\n";
    }
}

$Hero = new Hero("Goku", "Saiyan", 100, "Super Saiyan"); 
echo "Voici votre Hero:\n";
$Hero->afficher_info(); 

$Vilain = new Vilain("Freezer", "Aliens", 100, "Destruction"); 
echo "Voici votre Vilain:\n";
$Vilain->afficher_info();
?>