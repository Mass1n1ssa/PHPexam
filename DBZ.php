<?php
class Character
{
    protected string $name;
    protected int $ki;
    protected int $hp;
    protected int $damage;

    public function __construct($name, $hp, $damage)
    {
        $this->name = $name;
        $this->ki = 0 ;
        $this->hp = $hp;
        $this->damage = $damage;
    }

    public function attack($target)
    {
        $target->hp -= $this->damage;
        $this->ki += 10;
        echo $this->name . " attaque " . $target->name . " et lui inflige " . $this->damage . " points de dégats ! \n" . $this->name . " a maintenant " . $this->ki . " points de puissance ! \n";
        echo $target->name . " a maintenant " . $target->hp . " points de vie ! \n";
    }

    public function getName()
    {
        return $this->name;
    }

    public function getKi()
    {
        return $this->ki;
    }

    public function getHp()
    {
        return $this->hp;
    }
}

class Hero extends Character
{
    public function __construct($name, $ki, $hp, $damage)
    {
        parent::__construct($name, $ki, $hp, $damage);
    }
}

class Evil extends Character
{
    

    public function __construct($name, $ki, $hp, $damage)
    {
        parent::__construct($name, $ki, $hp, $damage);
        
    }

    // Fonction pour afficher le menu principal
function afficherMenuPrincipal() {
    echo "Menu de Jeu\n";
    echo "1. Devenir un Héros\n";
    echo "2. Devenir un Méchant\n";
    echo "3. Quitter\n";
    echo "Faites votre choix : ";
}

// Fonction pour afficher le menu des personnages héros
function afficherMenuHeros() {
    echo "Personnages Héros\n";
    echo "1. Goku\n";
    echo "2. Vegeta\n";
    echo "3. Gohan\n";
    echo "4. Retour au menu principal\n";
    echo "Faites votre choix : ";
}
}
