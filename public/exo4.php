<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload standard

// Charge toutes les données (Salles, Profs, Plannings)
require_once 'exoPlanning.php';

// À partir d'ici, les variables $plannings, $salles, $enseignants existent !

echo "<h1>Exercices Planning</h1>";

// Test Exercice 4 (Exemple)
$totalHeures = 0;
// A compléter