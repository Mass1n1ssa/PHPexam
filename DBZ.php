<?php
class Character // Creation of the class Character
{
    // Properties in protected so that they can be used in the classes that inherit from the Character class
    protected string $name;
    protected int $ki;
    protected int $hp;
    protected int $damage;

    // Constructor to initialize the properties of the class
    protected function __construct($name, $hp, $damage)
    {
        $this->name = $name;
        $this->ki = 0;
        $this->hp = $hp;
        $this->damage = $damage;
    }

    // Getters and setters to retrieve and modify the properties of the class
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

// Creation of the classes Hero and Evil that inherit from the Character class
class Hero extends Character
{
    // Constructor to initialize the properties of the class
    public function __construct($name, $hp, $damage)
    {
        parent::__construct($name, $hp, $damage);
    }
}

// Creation of the class Evil that inherit from the Character class
class Evil extends Character
{
    // Constructor to initialize the properties of the class
    public function __construct($name, $hp, $damage)
    {
        parent::__construct($name, $hp, $damage);
    }
}

// Creation of the class Game
class Game 
{
    // Properties in private so that they can only be used in the Game class
    private array $characters;
    private $currentCharacter = null;
    private $currentEnemies = null;

    // Constructor to initialize the properties of the class
    // the constructor is in private cause we only need it in the game class
    public function __construct(array $characters)
    {
        $this->characters = $characters;
    }

    //Function to display a message if the user enters an invalid choice
    //The function is in private cause we only need it in the game class
    private function displayError()
    {
        echo "Veuillez saisir un choix valide !";
        sleep(1);
        popen('cls', 'w');
    }

    // Function to get the information of the characters in private cause we only need it in the game class
    private function getInformations()
    {
        echo "Informations :\n\n";
        foreach ($this->characters as $character) {
            echo $character->getInformation();
        }
    }

    // Function to check if the character is dead
    private function IsDead($currentCharacter) 
    {
        if ($currentCharacter->getHp() <= 0) { // if the character's hp is less than or equal to 0, then the character is dead 
            return true;
        }
        return false;
    }

    // Function to attack the enemy and 
    //It is in private cause we only need it in the game class
    private function attack($target)
    {
        $damageAttack = $target->getDamage();
        $target->hp -= $damageAttack;

        $this->ki += 10;

        echo "Vous avez fait infligé " . $currentEnemies->getDamage() . " dégats à ennemi"; 
        $currentEnemies->setHp($currentEnemies->getHp() - $currentEnemies->getDamage());
        $currentEnemies->setKi($valueKi + 1);
    }

    // Function to attack the enemy and 
    // It is in private cause we only need it in the game class
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

    // Function to start the fight and 
    public function startFight($currentCharacter, $typeClass)
    {
        $enemies = $this->choiceEnemies($typeClass);

        for ($i = 0; $i < 3; $i++ ) { // Creation of a loop to display the characters according to the chosen camp
            if ($i < count ($enemies)) // if the index is less than the number of enemies, then the loop continues
                $this->fight($currentCharacter, $enemies[$i]); 
            else {
                popen('cls', 'w');
                echo "Vous avez fini le jeu !";
                sleep(3);
                return;
            }
        }
    }
    
    // Function to fight and 
    // It is in private cause we only need it in the game class
    private function fight($currentCharacter, $currentEnemies) 
    {
        // Creation of a loop to display the characters according to the chosen camp
        while ($this->IsDead($currentCharacter) == false && $this->IsDead($currentEnemies) == false) {
            echo "🧙 " . $currentCharacter->getName() . " | ❤️  " . $currentCharacter->getHp() . " | 💥 " . $currentCharacter->getKi() . " | 👹 " . $currentEnemies->getName() . " | ❤️  " . $currentEnemies->getHp() . " | 💥 " . $currentEnemies->getKi() . "\n\n" ;

            echo "[1] Attaquer\n[2] Fuir\n[3] Attaque spéciale\n[4] Sauvegarder\n\n";
            
            $choiceAction = (int) readline("Que voulez vous faire ? : ");

            popen('cls', 'w');

            $valueKi = $currentCharacter->getKi();

            // Using a switch to display the menu according to the user's choice
            switch ($choiceAction) 
            {
                case 1:
                    echo "Vous avez fait infligé " . $currentEnemies->getDamage() . " dégats à ennemi"; //METTRE ICI LE NOM DE L'ENNEMIE
                    $currentEnemies->setHp($currentEnemies->getHp() - $currentEnemies->getDamage());
                    $currentEnemies->setKi($valueKi + 1);
                    
                    sleep(2);
                    popen('cls', 'w');
                    return $this->fight($currentCharacter, $currentEnemies);
                case 2: 
                    echo "Vous avez fuit ! ";
                    sleep(2);
                    popen('cls', 'w');
                    return $this->fight($currentCharacter, $currentEnemies);
                case 3:
                    if ($valueKi >= 5) { // Here if the character has more than 5 ki points, then he can do a special attack
                        $currentCharacter->setKi($valueKi - 5);
                        $currentCharacter->setHp($currentCharacter->getHp() - 30);
                        echo "Vous avez fait une attaque spéciale ! ";
                        sleep(2);
                        popen('cls', 'w');
                    } else {
                        echo "Vous n'avez pas assez de points de puissance ! ";
                        sleep(2);
                        popen('cls', 'w');
                        return $this->fight($currentCharacter, $currentEnemies);
                    }
                    break;
                case 4:
                    echo "sauvegarde en cours ...";
                    sleep(2);
                    popen('cls', 'w');
                    return $this->saveGame($currentCharacter, $currentEnemies);
                    break;
                default:
                    $this->displayError();
                    return $this->fight($currentCharacter, $currentEnemies);
            }
            popen('cls', 'w');
        }

        // If the character is dead, then a message is displayed and the game is restarted
        if ($this->IsDead($currentCharacter) == true) {
            echo "Vous êtes mort !\n";
            sleep(2);
            popen('cls', 'w');
            return $this->startGame();
        }
    }

    // Function to choose the character and make it private cause we only need it in the game class
    private function choiceCharacter($typeClass)
    {
        echo "🧙 Choisissez votre personnage :\n\n";
        // Creation of a loop to display the characters according to the chosen camp
        for ($index = 0; $index < count($this->characters); $index++) { 
            // Ex : if $typeClass = "Hero" then only characters of type Hero will be displayed
            if ($this->characters[$index] instanceof $typeClass) { 
                echo "[" . ($index + 1) . "] " . $this->characters[$index]->getName() . "\n";
            }
        }

        echo "\n";
        // The readline function allows you to read a line from the standard input
        $choiceCharacter = (int) readline("Votre choix : ");

        popen('cls', 'w');

        // If the user enters a number greater than the number of characters, then an error message is displayed
        if ($choiceCharacter == null) {
            $this->displayError();
            return $this->choiceCharacter($typeClass);
        }

        // Creation of a loop to display the characters according to the chosen camp
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

    // Function to choose the camp and make it private cause we only need it in the game class
    private function choiceCamp()
    {
        echo "🚩 Choisissez votre camp : \n\n";
        echo "[1] Héro \n[2] Méchant\n\n";

        // The readline function allows you to read a line from the standard input
        $choiceCamp = (int) readline("Que voulez vous faire ? : ");

        popen('cls', 'w');

        // Using a switch to display the menu according to the user's choice
        if ($choiceCamp == 1) {
            $this->choiceCharacter("Hero");
        } else if ($choiceCamp == 2) {
            $this->choiceCharacter("Evil");
        } else {
            $this->displayError();
            return $this->choiceCamp();
        }
    }

    // Function to start the game and make it public so that it can be used outside the class
    public function startGame()
    {
        echo "🐉 Dragon Ball Z\n\n";
        echo "[1] ▶️  Jouer\n[2] 📊 Infos\n[3] 💾 Charger une sauvegarde\n[4] ❌ Quitter\n\n";

        $choiceMenu = (int) readline("Que voulez vous faire ? : ");

        popen('cls', 'w');

        // Using a switch to display the menu according to the user's choice
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

    // Function to save the game in savegame1.txt
    private function saveGame($currentCharacter, $currentEnemies)
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
            } else {
                echo "Échec de l'ouverture du fichier de sauvegarde en écriture.\n";
            }
        } else {
            echo "Aucun personnage sélectionné pour la sauvegarde.\n";
        }
    }

    // Function to load the game from the save file
    private function loadGame()
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

// Creation of the characters
$characters = [ 
    $goku = new Hero("Goku", 100, 10),
    $picolo = new Hero("Picolo", 75, 10),
    $vegeta = new Hero("Vegeta", 150, 15),
    $cell = new Evil("Cell", 40, 20),
    $freezer = new Evil("Freezer", 40, 20),
    $buu = new Evil("Buu", 50, 25)
];

// Creation of the game and start of the game
$game = new Game($characters); 
$game->startGame();