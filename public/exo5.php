<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload standard
require_once 'exoPlanning.php';

// Préparation des données
// 1. Alimentation de pas mal de salles
// --- Salles (Mixte : avec et sans PC) ---
/* $salleB202 = new Salle(1, "B202", 2, 24, 24); // Salle info
$salleA101 = new Salle(2, "A101", 1, 30, 1);  // Salle cours (1 PC prof)
$salleC004 = new Salle(3, "C004", 0, 15, 0);  // Petite salle réunion
$amphi     = new Salle(4, "Amphi", 0, 100, 0);// Grand Amphi
$laboRes   = new Salle(5, "Labo", 1, 12, 12); // Labo réseau
*/

// 2. Création d'un tableau avec toutes les salles créées à l'étape 1
// On regroupe pour l'exercice 5
// $salles = [$salleB202, $salleA101, $salleC004, $amphi, $laboRes];

// On s'attend à 37 postes informatiques
// On s'attend à ce que ce soit la salle Amphi qui ait le plus d'élèves

$totalPostesInformatiques = 0 ;
$salleMaxiNom="";
$salleMaxiNb = 0 ;
// Dans un foreach, la première variable doit être un tablaeu et exister avant
// ici: $salles
// si tableau simple, alors on va juste avoir as $variableBoucle où $variableBoucle on CHOISIT le NOM et elle n'existe pas avant
// si tableau associatif , alors on va aboir $clefBoucle => $valeurBoucle où on CHOISIT le NOM de la variable CLEF et le NOM de la variable VALEUR

// ICI: notre tableau est simple donc on choisit juste le nom
// AU début on avait choisi $salle
// Mr Robert a modifié pour l'appeler $nomDeVariableDeBoucleEstSalle
foreach ($salles as $nomDeVariableDeBoucleEstSalle) {
    $totalPostesInformatiques += $nomDeVariableDeBoucleEstSalle->getNbPostesInfo() ;
    if ($nomDeVariableDeBoucleEstSalle->getCapaciteEleve() > $salleMaxiNb) {
        $salleMaxiNom = $nomDeVariableDeBoucleEstSalle->getCode() ;
        $salleMaxiNb = $nomDeVariableDeBoucleEstSalle->getCapaciteEleve() ;
    }
}
echo "<h2>Total Postes Informatiques</h2>".$totalPostesInformatiques."\r\n";
echo "<h2>Salle avec la plus grande capacité</h2>".$salleMaxiNom;