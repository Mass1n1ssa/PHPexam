<?php 
    class Character {
        public $name;
        public $powerLevel;
        public $hp;
    }
    
    public function __construct($name, $powerLevel, $hp) {
        $this->name = $name;
        $this->powerLevel = $powerLevel;
        $this->hp = $hp;
    }


class Heros extends Personnage {

    public function __construct($name, $powerlevel, $, $special) {
        parent::__construct($name, $powerlevel, $hp);
        $this->special = $special;
    }

   
}

class Evil extends Personnage {
  
    public function __construct($name, $powerlevel, $hp, $special) {
        parent::__construct($name, $powerlevel, $hp);
        $this->special = $special;
    }
}

?>
