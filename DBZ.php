<?php 
    Class personnage{
        protected $nom;
        protected $puissance;
        protected $vie;

        public function __construct($nom,$puissance,$vie){
            $this->nom = $nom;
            $this->puissance = $puissance;
            $this->vie = $vie;
        }
    }

    Class heros extends personnage{
        public function __construct($nom,$puissance,$vie){
            parent::__construct($nom,$puissance,$vie);
        }
    }

    

?>