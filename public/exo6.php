<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload standard

use Ecole\Entity\Etudiant;
use Ecole\Entity\Filiere ;
// use \DateTime;


// 1ère partie: Préliminaire à l'exercice
// Initialisation
// On récupère les filières existantes (supposées créées précédemment)
// Si besoin : $filSlam = new Filiere(1, "BTS SIO", "SLAM"); ...

$filSlam = new Filiere(1, "BTS SIO", "SLAM");
$filSisr = new Filiere(2, "BTS SIO", "SISR");
$etudiants = []; // On repart sur une liste propre pour cet exercice

// 1. Les Majeurs confirmés (Nés en 2004, 2005...)
$etudiants[] = new Etudiant(20, "Coco", "Matis", new DateTime("2005-03-12"), $filSlam);      // ~20 ans
$etudiants[] = new Etudiant(21, "Mamri", "Amirouche", new DateTime("2004-01-20"), $filSlam); // ~22 ans
$etudiants[] = new Etudiant(22, "Durand", "Sophie", new DateTime("2003-07-14"), $filSlam);   // ~22 ans
$etudiants[] = new Etudiant(23, "Lefebvre", "Thomas", new DateTime("2005-11-30"), $filSisr); // ~20 ans

// 2. Les "Tout juste" Majeurs (Nés début 2008)
// Si on est le 14/01/2026, il a eu 18 ans hier.
$etudiants[] = new Etudiant(24, "Martin", "Chloé", new DateTime("2008-01-10"), $filSisr);   // 18 ans et 4 jours

// 3. Les Mineurs (Nés fin 2008, 2009, 2010)
$etudiants[] = new Etudiant(25, "Djalo", "Amadou", new DateTime("2008-12-15"), $filSlam);   // 17 ans (né fin d'année)
$etudiants[] = new Etudiant(26, "Tandia", "Sekou", new DateTime("2009-11-05"), $filSlam);   // 16 ans
$etudiants[] = new Etudiant(27, "Petit", "Enzo", new DateTime("2010-02-28"), $filSisr);      // 15 ans
$etudiants[] = new Etudiant(28, "Morel", "Léa", new DateTime("2009-05-20"), $filSlam);       // 16 ans
$etudiants[] = new Etudiant(29, "Roux", "Nathan", new DateTime("2009-09-09"), $filSisr);     // 16 ans
$etudiants[] = new Etudiant(30, "Garcia", "Manon", new DateTime("2010-08-15"), $filSlam);    // 15 ans

// Algorithme
// Parcourir la liste des étudiants
// Pour chaque étudiant, on calcule l'âge à la date du jour
// Si cet âge est inférieur à 18 alors l'étudiant est mineur
//    ==> On affiche [ALERTE] Prénom Nom est mineur (X ans).
// Sinon il est majeur
//    ==> On affiche Prénom Nom est majeur

foreach ($etudiants as $eleveEnc) {
    // La méthode diff PHP s'applique à une instance de Datetime et prend en paramètre une autre instance de DateTime
    // Ensuite, on accède à cette différence en années (ou jours ...) avec la bonne propriété
    // Dans notre exemple: l'instance est $eleveEnc->getDateNaissance()
    // Le paramètre c'est new DateTime() , soit la date du jour
    // la "bonne" propriété est y car on veut la différence en année pour obtenir l'âge
    $age = $eleveEnc->getDateNaissance()->diff(new DateTime())->y ;

    if ($age < 18)
        echo "[ALERTE] ".$eleveEnc->getPrenom()." ".$eleveEnc->getNom()." est mineur $age ans. \r\n" ;
    else echo $eleveEnc->getPrenom()." ".$eleveEnc->getNom()." est majeur. \r\n" ;

}
