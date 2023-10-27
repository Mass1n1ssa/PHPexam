<?php
 class Calculatrice {
    public $nb1 = 0;
    public $nb2 = 0;
    public $r = 0;
    public $i = 0;
    }
    public function __construct($nb1,$nb2) {
        $this->nb1 = $nb1;
        $this->nb2 = $nb2;
    }
    public function getNb() {
        $this->nb1 = readline("Taper le premier nombre > ");
        $this->nb2 = readline("Taper le deuxième nombre > ");
        $this->i = readline("Taper :\n1 pour add\n2 pour less\n3 pour mul\n4 pour div\n");
        if ($this->i == 1) {
            $this->add();
        } elseif ($this->i == 2) {
            $this->less();
        } elseif ($this->i == 3) {
            $this->mul();
        } elseif ($this->i == 4) {
            $this->div();
        } else {
            $this->getNb();
        }
    }
    function add(){
        $this->r = $this-> nb1 + $nb2
    }
?>