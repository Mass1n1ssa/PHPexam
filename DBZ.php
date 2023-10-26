<?php
class Character
{
    protected string $name;
    protected int $ki;
    protected int $hp;
    protected int $damage;

    public function __construct($name, $ki, $hp, $damage)
    {
        $this->name = $name;
        $this->ki = $ki;
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
}

$goku = new Hero("Goku", 9000, 100, 10);
$vegeta = new Evil("Vegeta", 8000, 150, 15);

// Test
echo "Avant l'attaque : \n";
echo $goku->getName() . " a " . $goku->getKi() . " points de puissance et " . $goku->getHp() . " points de vie.\n";
echo $vegeta->getName() . " a " . $vegeta->getKi() . " points de puissance et " . $vegeta->getHp() . " points de vie.\n";

echo "\nAprès l'attaque :\n";
$goku->attack($vegeta);

echo "\nAprès l'attaque de Vegeta :\n";
$vegeta->attack($goku);
