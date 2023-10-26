<?php
class Character // Creation of the class Character
{
    protected string $name;
    protected int $ki;
    protected int $hp;
    protected int $damage;

    protected function __construct($name, $hp, $damage)
    {
        $this->name = $name;
        $this->ki = 0;
        $this->hp = $hp;
        $this->damage = $damage;
    }

    protected function attack($target)
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

    public function setKi($ki)
    {
        $this->ki = $ki;
    }

    public function getHp()
    {
        return $this->hp;
    }
    
    public function getInformation()
    {
        echo "\e[31mNom\e[0m : " . $this->name . "\n";
        echo "\033[38;5;208mKi\e[0m : " . $this->ki . "\n";
        echo "\e[32mPoint de Vie\e[0m : " . $this->hp . "\n\n";
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
    private array $characters;
    public function __construct(array $characters)
    {
        $this->characters = $characters;
    }

    public function displayError()
    {
        echo "Veuillez saisir un choix valide !";
        sleep(1);
        popen('cls', 'w');
    }

    public function getInformations()
    {
        echo "Informations :\n\n";
        foreach ($this->characters as $character) {
            echo $character->getInformation();
        }
    }

    public function IsDead($currentCharacter) // Fonction pour vérifier si le personnage est mort
    {
        if ($currentCharacter->getHp() <= 0) {
            echo $currentCharacter->getName() . " est mort !\n";
            return true;
        }
        return false;
    }
    
    public function fight($currentCharacter) 
    {

        while ($this->IsDead($currentCharacter) == false) { // Boucle pour vérifier si le personnage est mort
            echo "🧙 " . $currentCharacter->getName() . " | ❤️  " . $currentCharacter->getHp() . " | 🔥 " . $currentCharacter->getKi() . "\n\n";
    
            echo "[1] Attaquer\n[2] Fuir\n[3] Attaque spéciale\n\n";
            
            $choiceAction = (int) readline("Que voulez vous faire ? : ");

            popen('cls', 'w');

            $valueKi = $currentCharacter->getKi();
            
            switch ($choiceAction) 
            {
                case 1:
                    echo "Vous avez attaquer ! ";
                    sleep(2);
                    return $this->fight($currentCharacter);
                case 2: 
                    echo "Vous avez fuit ! ";
                    sleep(2);
                    return $this->fight($currentCharacter);
                case 3:
                    if ($valueKi >= 5) { // Si le personnage a 5 points de puissance ou plus, il peut utiliser une attaque spéciale
                        $currentCharacter->setKi($valueKi - 5);
                        echo "Vous avez fait une attaque spéciale !\n\n";
                        sleep(2);
                    } else {
                        echo "Vous n'avez pas assez de points de puissance pour faire une attaque spéciale !\n\n";
                        return $this->fight($currentCharacter);
                    }
                    break;
                default:
                    $this->displayError();
                    return $this->fight($currentCharacter);
            }
            popen('cls', 'w');
        }
    }

    public function choiceCharacter($typeClass)
    {
        echo "Choisissez votre personnage :\n\n";
 
        for ($index = 0; $index < count($this->characters); $index++) { // Boucle pour afficher les personnages en fonction du camp choisi
            if ($this->characters[$index] instanceof $typeClass) { // Ex : si $typeClass = "Hero" alors uniquement les personnages de type Hero seront affichés
                echo "[" . ($index + 1) . "] " . $this->characters[$index]->getName() . "\n";
            }
        }

        echo "\n";

        $choiceCharacter = (int) readline("Votre choix : ");

        popen('cls', 'w');

        if ($choiceCharacter == null) {
            $this->displayError();
            return $this->choiceCharacter($typeClass);
        }

        for ($i = 0; $i < count($this->characters); $i++) {
            if ($this->characters[$i] instanceof $typeClass) {
                if ($choiceCharacter == $i + 1) {
                    $this->characters[$i]->setKi(10); // TEST A SUPPRIMER
                    $this->fight($this->characters[$i]); // Lancement du combat avec le personnage choisi
                } else if ($choiceCharacter > count($this->characters)) {
                    $this->displayError();
                    return $this->choiceCharacter($typeClass);
                } 
            }
        }
    }

    public function choiceCamp()
    {
        echo "Choisissez votre camp : \n\n";
        echo "[1] Héro \n[2] Méchant\n\n";

        $choiceCamp = (int) readline("Votre choix : ");

        popen('cls', 'w');

        if ($choiceCamp == 1) {
            $this->choiceCharacter("Hero");
        } else if ($choiceCamp == 2) {
            $this->choiceCharacter("Evil");
        } else {
            $this->displayError();
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
                return $this->choiceCamp();
            case 2:
                return $this->getInformations();
            case 3:
                break;
            case 4:
                echo "Fermeture du jeu...";
                sleep(2);
                popen('cls', 'w');
                break;
            default:
                $this->displayError();
                return $this->startGame();
        }
    }
}

$characters = [ // Création des personnages
    $goku = new Hero("Goku", 100, 10),
    $picolo = new Hero("Picolo", 75, 10),
    $vegeta = new Hero("Vegeta", 150, 15),
    $cell = new Evil("Cell", 200, 20),
    $freezer = new Evil("Freezer", 200, 20),
    $buu = new Evil("Buu", 250, 25)
];

$game = new Game($characters); 
$game->startGame();


// // Test
// echo "Avant l'attaque : \n";
// echo $goku->getName() . " a " . $goku->getKi() . " points de puissance et " . $goku->getHp() . " points de vie.\n";
// echo $vegeta->getName() . " a " . $vegeta->getKi() . " points de puissance et " . $vegeta->getHp() . " points de vie.\n";

// echo "\nAprès l'attaque :\n";
// $goku->attack($vegeta);

// echo "\nAprès l'attaque de Vegeta :\n";
// $vegeta->attack($goku);

