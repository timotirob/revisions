<?php
// 1. Chargement de l'autoloader Composer
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
    $matWeb  = new Matiere(100, "Dév Web", "Bloc 1");
    $profTuring = new Enseignant(1, "Turing", "Alan");


    $eleveMarie = new Etudiant(
        1,
        "Dupont",
        "Marie",
        new DateTime("2005-06-15"),
        $filSlam
    );
    $eleveCoco = new Etudiant(
        2,
        "Coco",
        "Matis",
        new DateTime("2005-06-15"),
        $filSlam
    ) ;
    $eleveMat = new Etudiant(
        3,
        "Matmati",
        "Ibrahim",
        new DateTime("2005-06-15"),
        $filSisr
    );
    $eleveTandia = new Etudiant(
        4,
        "Tandia",
        "Sekou",
        new DateTime("2005-06-15"),
        $filSlam
    ) ;
    $listeEtudiants = array($eleveMarie, $eleveCoco, $eleveMat, $eleveTandia);

    foreach ($listeEtudiants as $etudiant) {
        $filiere = $etudiant->getFiliere();
        if ($filiere->getOption() === "SLAM") {
            echo "<p>Étudiant : " . $etudiant->getPrenom() . " " . $etudiant->getNom() . "</p>\r\n";
        }

    }



  /*  $eleve->ajouterEvaluation(
        new Evaluation(1, 15.5, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );*/

    // 4. Exemple d'affichage pour vérifier que tout marche
    /*echo "<h1>Système chargé avec succès</h1>";
    echo "<p>Étudiant : " . $eleve->getPrenom() . " " . $eleve->getNom() . "</p>";
    echo "<p>Filière : " . $eleve->getFiliere()->getLibelle() . "</p>";*/






} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}