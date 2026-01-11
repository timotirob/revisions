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
    $matWeb  = new Matiere(100, "Dév Web", "Bloc 1");
    $profTuring = new Enseignant(1, "Turing", "Alan");

    $eleve = new Etudiant(
        1,
        "Dupont",
        "Marie",
        new DateTime("2005-06-15"),
        $filSlam
    );

    $eleve->ajouterEvaluation(
        new Evaluation(1, 15.5, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );

    // 4. Exemple d'affichage pour vérifier que tout marche
    echo "<h1>Système chargé avec succès</h1>";
    echo "<p>Étudiant : " . $eleve->getPrenom() . " " . $eleve->getNom() . "</p>";
    echo "<p>Filière : " . $eleve->getFiliere()->getLibelle() . "</p>";

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}