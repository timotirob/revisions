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
    $eleveAM = new Etudiant(
        5,
        "Sekou",
        "Anne Marie",
        new DateTime("2005-06-15"),
        $filSlam
    ) ;
    $listeEtudiants = array($eleveMarie, $eleveCoco, $eleveMat, $eleveTandia, $eleveAM);

    foreach ($listeEtudiants as $etudiant) {
        $email = strtolower(str_replace(' ', '', $etudiant->getPrenom() . "." . $etudiant->getNom()). "@ecole-sio.fr");
        echo $etudiant->getPrenom()." ".$etudiant->getNom()."->".$email."\n";

    }

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}