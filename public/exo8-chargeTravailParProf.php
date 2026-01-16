<?php
// Matis Coco
require_once __DIR__ . '/../vendor/autoload.php';

require_once 'exoPlanning.php';

$heuresParProf = [];

foreach ($plannings as $planning) {
    if($planning->getSemaine() === "S42"){
        //prendre le nom de l'enseignant
        // -> : opérateur de navigabiliter / en java .
        $nomProf = $planning->getEnseignant()->getNom();
        if (!isset($heuresParProf[$nomProf])) {
            $heuresParProf[$nomProf] = 0;
        }
        //ajoute la durée(incrémentant) dans le tableau en associant le prof
        $heuresParProf[$nomProf] += $planning->getDuree();
        //echo var_dump($heuresParProf = [$nomProf]) affiche les informations structurées du tableau;
        // . : concaténation / en java  +
        //echo $nomProf . " : " . $heuresParProf[$nomProf] ."\n\r";
    }
}

// Pour les tableaux associatifs on utilise la syntaxe
// foreach ($nomTableauAssociatif as $nomClefBoucle => $nomValeurBoucle)
foreach ($heuresParProf as $nomProf => $duree) {
    echo $nomProf . " a travaillé " . $duree . " heures \n";
}