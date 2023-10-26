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

    class Hero extends Character {

    }
    

?>