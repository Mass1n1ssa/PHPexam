<?php
    abstract class forme{
        abstract public function calculerAire();
        abstract public function calculerPerimetre();
    }
    class carre extends forme {
        public $contour;

        public function __construct($C){
            $this->contour = $C;
        }

        public function calculerAire(){
            return $this-> contour * 4;
        }
        public function calculerPerimetre(){
            return $this-> contour * $this-> contour;

        }
    }
    
    
    
    class rectangle extends forme {
        public $longueur;
        public $largeur;
    
        public function __construct($L, $l)
        {
            $this->longueur = $L;
            $this->largeur = $l;
        }
    
        public function calculerAire(){
            return $this->longueur * $this->largeur;
        }
    
        public function calculerPerimetre(){
            return 2 * ($this->longueur + $this->largeur);
        }
    }
    
    class triangle extends forme {
        public $a;
        public $b;
        public $c;
    
        public function __construct($A,$B) {
            $this->a = $A;
            $this->b = $B;
        }
    
        public function calculerAire(){
            return ($this->a * $this->b) / 2;
        }
    
        public function calculerPerimetre(){
            return $this->a + $this->b + $this->c;
        }
    }
    $carre1= new carre(10);

    echo"laire du carre est" . $carre1->calculerAire()."\n";
    echo"le perimetre du carre est ". $carre1->calculerPerimetre().".\n";
   
    $rectangle1 = new rectangle(5, 5);
    
    echo "L'aire du rectangle est " . $rectangle1->calculerAire() . "\n";
    echo "Le périmètre du rectangle est " . $rectangle1->calculerPerimetre() . "\n";
    
    $triangle1 = new triangle(5, 5);
    
    echo $triangle1->calculerAire() . "\n";
    echo $triangle1->calculerPerimetre() . "\n";
?>