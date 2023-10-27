<?php
    Class personnage {
        $nom;
        $classe;
        $nv

        public function __construct(){
            $this->nom = $nom;
            $this->classe = $classe;
            $this->nv = $nv;
        }
        public function afficher_info(){
            echo "Nom : " . $this->nom . "\n";
            echo "Classe : " . $this->classe . "\n";
            echo "Niveau (NV) : " . $this->nv . "\n";
        }
    }
    class inventaire {
        $marteau;
        $epee;
        $fleche;
        public function __construct(){
            $this->marteau = $marteau;
            $this->epee = $epee;
            $this->fleche = $fleche;
        }

    public function ajouter_objet(){
        
    }
    }

?>