<?php 
    class Character 
    {
        protected string $name;
        protected int $powerLevel;
        protected int $hp;
        protected int $damage;

        public function __construct($name, $powerLevel, $hp, $damage)
        {
            $this->name = $name;
            $this->powerLevel = $powerLevel;
            $this->hp = $hp;
            $this->damage = $damage;
        }
    }
    
    class Hero extends Character {
        public function __construct($name, $powerLevel, $hp) {
            parent::__construct($name, $powerLevel, $hp);
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

    class Evil extends Character {
    
        public function __construct($name, $powerlevel, $hp, $special) {
            parent::__construct($name, $powerlevel, $hp);
            $this->special = $special;
        }
    }

    $goku = new Hero("Goku", 9000, 100, 10);
    $vegeta = new Hero("Vegeta", 8000, 150, 15);

?>
