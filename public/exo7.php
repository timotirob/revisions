<?php
// Calcul de la vraie moyenne uniquement pour un bloc
// Point de départ: nous avons déjà une méthode dans Etudiant pour calculer la vraie moyenne sur l'ensemble des notes

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
    $matCyb = new Matiere(95, "Cyber", "Bloc 3");

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
        new Evaluation(1, 15.5, 2, "DST", $matCyb, $profTuring, new DateTime("now"))
    );
    $eleveCoco->ajouterEvaluation(
        new Evaluation(1, 17.5, 2, "DST", $matCyb, $profTuring, new DateTime("now"))
    );
    $eleveCoco->ajouterEvaluation(
        new Evaluation(1, 8, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );
    $eleveCoco->ajouterEvaluation(
        new Evaluation(1, 10, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );
    $eleveSekou = new Etudiant(
        2,
        "Tandia",
        "Sekou",
        new DateTime("2005-06-15"),
        $filSlam
    );
    $eleveSekou->ajouterEvaluation(
        new Evaluation(1, 16, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );
    $eleveSekou->ajouterEvaluation(
        new Evaluation(2, 12, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );
    $eleveSekou->ajouterEvaluation(
        new Evaluation(3, 18, 2, "DST", $matWeb, $profTuring, new DateTime("now"))
    );
    $eleveSekou->ajouterEvaluation(
        new Evaluation(4, 16, 2, "DST", $matCyb, $profTuring, new DateTime("now"))
    );

    $listeEleves = [$eleveCoco, $eleveSekou];

    // On veut la sortie de ce genre là:

    /***
     * Sortie attendue : > "Marie Dupont : Bloc 1 VALIDÉ (15/20)"
     * > "Lucas Martin : Bloc 1 NON VALIDÉ (8.5/20)"
     */
    // Parcourt la liste d'Eleves
    // Récupère nom, prénom et moyenne
    // Affichage conditionnel à la valeur de la moyenne du Bloc 1

    foreach ($listeEleves as $eleve) {
        $moyenneBloc1 = $eleve->calculVraieMoyenne("Bloc 1");

        if ($moyenneBloc1 >= 10) {
        echo $eleve->getNom()." ".$eleve->getPrenom()." : BLOC 1 VALIDE ($moyenneBloc1"."/20)"."\r\n";}
        else
            echo $eleve->getNom()." ".$eleve->getPrenom()." : BLOC 1 NON VALIDE ($moyenneBloc1"."/20)"."\r\n";
        }

    //echo "La moyenne de: " . $eleveCoco->getNom() . " est de: " . $eleveCoco->calculVraieMoyenne("Bloc 1");



} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}