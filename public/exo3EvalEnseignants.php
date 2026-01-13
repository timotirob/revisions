<?php
require_once __DIR__ . '/../vendor/autoload.php';

// 2. Importation des classes (plus besoin de require 'classes.php')
use Ecole\Entity\Filiere;
use Ecole\Entity\Matiere;
use Ecole\Entity\Enseignant;
use Ecole\Entity\Etudiant;
use Ecole\Entity\Evaluation;

try {
    $filSlam = new Filiere(1, "BTS SIO", "SLAM");
    $filSisr = new Filiere(2, "BTS SIO", "SISR");
    $matWeb  = new Matiere(100, "Dév Web", "Bloc 1");
    $matData  = new Matiere(110, "Data", "Bloc 2");

// PREPARATION
// ajouter Mr Turing
    $profTuring = new Enseignant(1, "Turing", "Alan");

// Ajouter un prof pour tester
    $profRobert = new Enseignant(2, "Robert", "Tim");

// AJouter une liste d'étudiants avec des évaluations
    $eleveMarie = new Etudiant(
        1,
        "Dupont",
        "Marie",
        new DateTime("2005-06-15"),
        $filSlam
    );

    $eleveMarie->ajouterEvaluation(
        new Evaluation(1, 15.5, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );
    $eleveMarie->ajouterEvaluation(
        new Evaluation(1, 15.5, 2, "DST", $matData, $profRobert, new DateTime("now"))
    );

    $eleveCoco = new Etudiant(
        2,
        "Coco",
        "Matis",
        new DateTime("2005-06-15"),
        $filSlam
    ) ;

    $eleveCoco->ajouterEvaluation(
        new Evaluation(1, 17, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );
    $eleveCoco->ajouterEvaluation(
        new Evaluation(1, 19, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );
    $eleveCoco->ajouterEvaluation(
        new Evaluation(1, 19, 2, "DST", $matData, $profRobert, new DateTime("now"))
    );

// Algorithme pour l'exercice
// Parcourez tous les étudiants
    $listeEtudiants = [$eleveMarie, $eleveCoco];
// Pour chaque étudiant:
    foreach ($listeEtudiants as $etudiant) {
        // Récupérez ses évaluations:
        // Parcourir ses évaluations
        foreach ($etudiant->getEvaluations() as $evaluation) { // la récupération des évaluations et le parcours se font en même temps
            // Récupérer le professeur associé à l'évaluttion
            $prof = $evaluation->getEnseignant() ;
            // SI ce professeur est Turing:
            if ($prof != null && $prof->getNom()=== 'Turing') {
                // Faire l'affichage: Format de sortie : > "Note de 15/20 donnée par M. Turing à l’étudiant Dupont en Développement Web."
                echo "Note de ".$evaluation->getNote()." donnée par M. ".$prof->getNom()." à l’étudiant ".$etudiant->getNom()." en ".$evaluation->getMatiere()->getLibelle()."\r\n" ;
            }
        }
    }


} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}