<?php 
    class Character {
    public $name;
    public $powerLevel;
    public $hp;
   

    public function __construct($name, $powerLevel, $hp) {
        $this->name = $name;
        $this->powerLevel = $powerLevel;
        $this->hp = $hp;
        echo" Bienvenue sur Dokkan Batlle! choisissez votre personnage";
    }

    public function attack($target) {
        $target->hp -= $this->powerLevel;
        if ($target->hp <= 0) {
            echo $target->name . " est mort !";
        } else {
            echo $target->name . " a survécu !";
        }
    }
}

class Hero extends Character {
    public function __construct($name, $powerLevel, $hp) {
        parent::__construct($name, $powerLevel, $hp);
    }
}

class Evil extends Character {
    public $special;

    public function __construct($name, $powerLevel, $hp, $special) {
        parent::__construct($name, $powerLevel, $hp);
        $this->special = $special;
    }
}

$goku = new Hero("Goku", 9000, 100);
$vegeta = new Hero("Vegeta", 8000, 150);

$freezer = new Evil("Freezer", 12000, 200, "Transformations multiples");
$cell = new Evil("Cell", 14000, 250, "Absorption des androïdes");

    

?>
