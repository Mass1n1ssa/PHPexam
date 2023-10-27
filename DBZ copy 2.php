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

    public function getName()
    {
        return $this->name;
    }

    public function getKi()
    {
        return $this->ki;
    }

    public function getDamage()
    {
        return $this->damage;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function setKi($ki)
    {
        $this->ki = $ki;
    }

    public function setHp($hp)
    {
        $this->hp = $hp;
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
    protected array $characters;
    protected $currentCharacter = null;
    protected $currentEnemies = null;

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
        if ($currentCharacter->getHp() <= 0) { // Si les points de vie du personnage sont inférieurs ou égaux à 0, alors il renvoie true sinon false
            return true;
        }
        return false;
    }
    
    private function dead($currentCharacter, $currentEnemies)
    {
        if ($this->IsDead($currentCharacter)) {
            echo "Vous êtes mort ! ";
            sleep(2);
            popen('cls', 'w');
            return;
        } else if ($this->IsDead($currentEnemies)) {
            echo "Vous avez gagné le combat ! ";
            sleep(2);
            popen('cls', 'w');
        }
    }

    private function attack($currentCharacter, $target, $typeAttack)
    {
        if ($typeAttack == "normal") {
            $damageCharacter = $currentCharacter->getDamage();
            $target->setHp($target->getHp() - $damageCharacter);
            $currentCharacter->setKi($currentCharacter->getKi() + 1);
    
            echo "Vous avez infligé " . $damageCharacter . " dégats à " . $target->getName();
            sleep(2);
            popen('cls', 'w');
        } else if ($typeAttack == "special") {
            if ($currentCharacter->getKi() >= 3) {
                $damageCharacter = $currentCharacter->getDamage() * 2.5;
                $target->setHp($target->getHp() - $damageCharacter);
                $currentCharacter->setKi($currentCharacter->getKi() - 2);
        
                echo "Vous avez infligé " . $damageCharacter . " dégats à " . $target->getName();
                sleep(2);
                popen('cls', 'w');
            } else {
                echo "Vous n'avez pas assez de Ki pour utiliser cette attaque !";
                sleep(2);
                popen('cls', 'w');
            }
        }      

        if (!($this->IsDead($target))) {
            $damageTarget = $target->getDamage();
            $currentCharacter->setHp($currentCharacter->getHp() - $damageTarget);
            $target->setKi($target->getKi() + 1);
    
            echo $target->getName() . " a infligé " . $damageTarget . " dégats à " . $currentCharacter->getName();
            sleep(2);
            popen('cls', 'w');
        }
    }

    private function choiceEnemies($typeClass)
    {
        for ($index = 0; $index < count($this->characters); $index++) { // Boucle pour afficher les personnages en fonction du camp choisi
            if (!($this->characters[$index] instanceof $typeClass)) { // Ex : si $typeClass = "Hero" alors uniquement les personnages de type Hero seront affichés
                // return $this->characters[$index];
                $enemies[] = $this->characters[$index];
            }
        }

        return $enemies;
    }

    public function startFight($currentCharacter, $typeClass)
    {
        $enemies = $this->choiceEnemies($typeClass);

        for ($i = 0; $i < 3; $i++ ) { // Création d'une boucle for pour faire 3 combats
            if ($i < count ($enemies)) // Si le nombre d'ennemis est inférieur à 3, alors on continue les combats

                $this->fight($currentCharacter, $enemies[$i]); // Exécution de la méthode fight avec le personnage choisi et son ennemi
            else {
                popen('cls', 'w');
                echo "Vous avez fini le jeu !";
                sleep(3);
                return;
            }
        }
    }
    
    public function fight($currentCharacter, $currentEnemies) 
    {
        $this->dead($currentCharacter, $currentEnemies);
        while ($this->IsDead($currentCharacter) == false && $this->IsDead($currentEnemies) == false) {
            $this->dead($currentCharacter, $currentEnemies);
            echo "👽 " . $currentCharacter->getName() . " | ❤️  " . $currentCharacter->getHp() . " | 💥 " . $currentCharacter->getKi() . "  \033[1mVS\033[0m  " . "🧙 " . $currentEnemies->getName() . " | ❤️  " . $currentEnemies->getHp() . " | 💥 " . $currentEnemies->getKi() . "\n\n";

            echo "[1] Attaquer\n[2] Attaque spéciale\n[3] Sauvegarder\n\n";
            
            $choiceAction = (int) readline("Que voulez vous faire ? : ");

            popen('cls', 'w');

            $valueKi = $currentCharacter->getKi();

            switch ($choiceAction) 
            {
                case 1:
                    $this->attack($currentCharacter, $currentEnemies, "normal");
                    return $this->fight($currentCharacter, $currentEnemies);
                case 2:
                    $this->attack($currentCharacter, $currentEnemies, "special");
                    return $this->fight($currentCharacter, $currentEnemies);
                case 3:
                    echo "sauvegarde en cours ...";
                    sleep(2);
                    popen('cls', 'w');
                    return $this->saveGame($currentCharacter, $currentEnemies);
                default:
                    $this->displayError();
                    return $this->fight($currentCharacter, $currentEnemies);
            }
            popen('cls', 'w');
        }
    }

    public function choiceCharacter($typeClass)
    {
        echo "🧙 Choisissez votre personnage :\n\n";
 
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
                    $this->startFight($this->characters[$i], $typeClass);
                } else if ($choiceCharacter > count($this->characters)) {
                    $this->displayError();
                    return $this->choiceCharacter($typeClass);
                } 
            }
        }
    }

    public function choiceCamp()
    {
        echo "🚩 Choisissez votre camp : \n\n";
        echo "[1] Héro \n[2] Méchant\n\n";

        $choiceCamp = (int) readline("Que voulez vous faire ? : ");

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
        echo "🐉 Dragon Ball Z\n\n";
        echo "[1] ▶️  Jouer\n[2] 📊 Infos\n[3] 💾 Charger une sauvegarde\n[4] ❌ Quitter\n\n";

        $choiceMenu = (int) readline("Que voulez vous faire ? : ");

        popen('cls', 'w');

        switch ($choiceMenu) 
        {
            case 1:
                return $this->choiceCamp();
            case 2:
                return $this->getInformations();
            case 3:
                echo "Chargement de la sauvegarde...";
                sleep(2);
                popen('cls', 'w');
                return $this->loadGame();
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

    public function saveGame($currentCharacter, $currentEnemies)
    {
        if ($currentCharacter && $currentEnemies) {
            $data = serialize([$currentCharacter, $currentEnemies]);

            // Ouvrir le fichier en écriture
            $file = fopen('savegame1.txt', 'w');

            if ($file) {
                // Écrire les données sérialisées dans le fichier
                fwrite($file, $data);
                fclose($file); // Fermer le fichier
                echo "Jeu sauvegardé!\n";
                return $this->startGame();
            } else {
                echo "Échec de l'ouverture du fichier de sauvegarde en écriture.\n";
            }
        } else {
            echo "Aucun personnage sélectionné pour la sauvegarde.\n";
        }
    }

    public function loadGame()
    {
        $file = fopen("savegame1.txt", "r");

        if ($file) {
            $data = fread($file, filesize("savegame1.txt"));
            fclose($file);

            $loadedData = unserialize($data);

            if (is_array($loadedData) && count($loadedData) == 2) {
                list($currentCharacter, $currentEnemies) = $loadedData;
                echo "Jeu chargé!\n";
                $this->currentCharacter = $currentCharacter;
                $this->currentEnemies = $currentEnemies;
                return $this->fight($currentCharacter, $currentEnemies);
            } else {
                echo "Données de sauvegarde invalides.\n";
            }
        } else {
            echo "Échec de l'ouverture du fichier de sauvegarde en lecture.\n";
        }
    }
}

$characters = [ // Création des personnages
    $goku = new Hero("Goku", 100, 10),
    $picolo = new Hero("Picolo", 75, 10),
    $vegeta = new Hero("Vegeta", 150, 15),
    $cell = new Evil("Cell", 40, 20),
    $freezer = new Evil("Freezer", 40, 25),
    $buu = new Evil("Buu", 50, 25)
];

$game = new Game($characters); 
$game->startGame();