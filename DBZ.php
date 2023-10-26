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
    
    class Hero extends Character 
    {
        public function __construct($name, $powerLevel, $hp, $damage)
        {
            parent::__construct($name, $powerLevel, $hp, $damage);
        }

        public function attack($target) {
            $target->hp -= $this->damage;
            $this->powerLevel += 10;
            echo $this->name . " attaque " . $target->name . " et lui inflige " . $this->$damage . " points de dégats ! <br>" . $this->name . " a maintenant " . $this->powerLevel . " points de puissance ! <br>" ;
        }
    }

    class Evil extends Character {
        public function __construct($name, $powerLevel, $hp, $damage)
        {
            parent::__construct($name, $powerLevel, $hp, $damage);
        }
    
        public function __construct($name, $powerlevel, $hp, $special) {
            parent::__construct($name, $powerlevel, $hp);
            $this->special = $special;
        }
    }

    $goku = new Hero("Goku", 9000, 100, 10);
    $vegeta = new Hero("Vegeta", 8000, 150, 15);

?>
