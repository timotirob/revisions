<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload standard

// Charge toutes les données (Salles, Profs, Plannings)
require_once 'exoPlanning.php';

// À partir d'ici, les variables $plannings, $salles, $enseignants existent !

echo "<h1>Exercices Planning</h1> \r\n";

// Test Exercice 4 (Exemple)
$totalHeures = 0;
//Parcourir les données du tableau plannings
foreach ($plannings as $planning) {
    //filtre pour spécifier la semaine visée ici S42
    if ($planning->getSemaine() === 'S42'){
        //cumul des heures
        $totalHeures += $planning->getDuree();
    }
}
//affichage
echo "Total heures pour la semaine S42 ".$totalHeures." heures";