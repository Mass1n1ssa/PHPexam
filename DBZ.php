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
        $this->ki = 0;
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

    public function getInformations()
    {
        echo "\e[31mNom\e[0m : " . $this->name . "\n";
        echo "\033[38;5;208mClasse\e[0m : " . $this->class . "\n";
        echo "\e[32mNiveau\e[0m : " . $this->level . "\n";
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
    public function __construct($name, $hp, $damage)
    {
        parent::__construct($name, $hp, $damage);
    }
}

class Evil extends Character
{
    

    public function __construct($name, $hp, $damage)
    {
        parent::__construct($name, $hp, $damage);
        
    }
}

class Game 
{
    public function choiceCamp()
    {
        echo "Choisissez votre camp : \n\n";

        echo "[1] Héro \n[2] Méchant\n\n";

        $choiceCamp = (int) readline("Votre choix : ");

        if ($choiceCamp == 1) {
            echo "Vous avez choisi le camp des héros !\n\n";

        } else if ($choiceCamp == 2) {
            echo "Vous avez choisi le camp des méchants !\n\n";
        } else {
            echo "Veuillez saisir un choix valide !";
            sleep(1);
            popen('cls', 'w');
            return $this->choiceCamp();
        }
    }

    public function startGame()
    {
        echo "Dragon Ball Z\n\n";

        echo "[1] Jouer \n[2] Infos \n[3] Charger une sauvegarde \n[4] Quitter\n\n";

        $choiceMenu = (int) readline("Que voulez vous faire ? : ");

        popen('cls', 'w');

        switch ($choiceMenu) 
        {
            case 1:
                $this->choiceCamp();
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                echo "Fermeture du jeu...";
                sleep(2);
                popen('cls', 'w');
                break;
        }
    }
}

$goku = new Hero("Goku", 100, 10);
$vegeta = new Evil("Vegeta", 150, 15);

$game = new Game();
$game->startGame();

// // Test
// echo "Avant l'attaque : \n";
// echo $goku->getName() . " a " . $goku->getKi() . " points de puissance et " . $goku->getHp() . " points de vie.\n";
// echo $vegeta->getName() . " a " . $vegeta->getKi() . " points de puissance et " . $vegeta->getHp() . " points de vie.\n";

// echo "\nAprès l'attaque :\n";
// $goku->attack($vegeta);

// echo "\nAprès l'attaque de Vegeta :\n";
// $vegeta->attack($goku);

