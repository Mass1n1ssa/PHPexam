<?php
   abstract class Animal{

    abstract protected function parler();
    abstract protected function manger();
}

class Chien extends Animal{

    public function parler(){
        echo "Woof";
    }
    public function manger(){
        echo"il manges des chat";
    }
}

class Chat extends Animal{
    
    public function parler(){
        echo "Meow";
    }
    public function manger(){
        echo"il manges des souris";
    }

}
class oiseaux extends Animal{
    
    public function parler(){
        echo "oooo";
    }
    public function manger(){
        echo"il manges des fourmi";
    }
    
}

$chien = new Chien();
echo $chien->parler()."\n";
echo $chien ->manger()."\n";

$chat = new Chat();
echo $chat->parler()."\n";
echo $chat ->manger()."\n";

$oiseaux = new oiseaux();
echo $oiseaux ->parler()."\n";
echo $oiseaux ->manger();
?>