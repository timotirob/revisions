<?php
require_once __DIR__ . '/../vendor/autoload.php';

// 2. Importation des classes (plus besoin de require 'classes.php')
use Ecole\Entity\Filiere;
use Ecole\Entity\Matiere;
use Ecole\Entity\Enseignant;
use Ecole\Entity\Etudiant;
use Ecole\Entity\Evaluation;

// 3. Création des données (Bootstrap)
try {
    $filSlam = new Filiere(1, "BTS SIO", "SLAM");
    $filSisr = new Filiere(2, "BTS SIO", "SISR");
    $matWeb = new Matiere(100, "Dév Web", "Bloc 1");
    $profTuring = new Enseignant(1, "Turing", "Alan");


    $eleveCoco = new Etudiant(
        2,
        "Coco",
        "Matis",
        new DateTime("2005-06-15"),
        $filSlam
    );
    $eleveCoco->ajouterEvaluation(
        new Evaluation(1, 15.5, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );
    $eleveCoco->ajouterEvaluation(
        new Evaluation(1, 17.5, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );
    $eleveCoco->ajouterEvaluation(
        new Evaluation(1, 20, 100, "DST", $matWeb, $profTuring, new DateTime("now"))
    );

    echo "La moyenne de: ".$eleveCoco->getNom()." est de: ". $eleveCoco->calculVraieMoyenne() ;

}
catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}