<?php
  class CompteBancaire{

    public $solde;

    public function __construct(){
        $this->solde = 200;
    }
    public function get_solde(){
        return $this->solde;
    }


    public function Modification($solde){
        $Choix = readline("Que voulez-vous faire, deposer (+) ou retirer (-) de l'argent ? : ");
        $Montant = readline("Entrez votre montant : ");
        switch ($Choix){
            case "+":
                $Somme = $this->solde + $Montant;
                echo ("Votre compte bancaire est de  ". $Somme );
                break;
            case "-":
                $Soustraction = $this->solde - $Montant;
                    if ($Soustraction < 0){
                        echo "Votre opération est impossible";
                    }
                    else{
                    echo ("Votre compte bancaire est de ". $Soustraction );
                    }
                break;
            default:
            echo ("Opération invalide" );
        }
    }

}

$CompteBancaire= new CompteBancaire();
echo $CompteBancaire->get_solde();
$CompteBancaire->Modification("");
?>