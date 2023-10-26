<?php 
    class Character {
        protected $name;
        protected $powerLevel;
        protected $hp;
        protected $damage;

        public function __construct($name, $powerLevel, $hp) {
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
            $target->hp -= $this->damage;
            $this->powerLevel += 10;
            echo $this->name . " attaque " . $target->name . " et lui inflige " . $this->$damage . " points de dégats ! <br>" . $this->name . " a maintenant " . $this->powerLevel . " points de puissance ! <br>" ;
        }
    }

   


    class Evil extends Character {
    
        public function __construct($name, $powerlevel, $hp, $special) {
            parent::__construct($name, $powerlevel, $hp);
            $this->special = $special;
        }
    }

?>
