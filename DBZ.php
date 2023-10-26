<?php 
    class Character {
        public $name;
        public $powerLevel;
        public $hp;

        public function attack($target) {
            $target->hp -= $this->powerLevel;
            if ($target->hp <= 0) {
                echo $target->name . " est mort !";
            } else {
                echo $target->name . " a survécu !";
            }
        }
    }
    
    public function __construct($name, $powerLevel, $hp) {
        $this->name = $name;
        $this->powerLevel = $powerLevel;
        $this->hp = $hp;
    }

    class Hero extends Character {
        public function __construct($name, $powerLevel, $hp) {
            parent::__construct($name, $powerLevel, $hp);
        }
    }

   


    class Evil extends Character {
    
        public function __construct($name, $powerlevel, $hp, $special) {
            parent::__construct($name, $powerlevel, $hp);
            $this->special = $special;
        }
    }

?>
