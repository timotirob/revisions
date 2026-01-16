<?php
require_once __DIR__ . '/../vendor/autoload.php';

require_once 'exoPlanning.php';
/*
 * <select name="enseignant">
    <option value="1">Turing Alan</option>
    <option value="2">Lovelace Ada</option>
</select>
 */

// A partir du tablau d'Enseignants $enseignants on veut générer l'élément SELECT de formulaire comme ci dessus

// On initialise l'élément de formulaire (SELECT)
// On parcourt le tableau
// On récupère l'id, le nom et le prénom en même temps qu'on formatte
// On ferme l'élément de formulaire

echo '<select name="enseignant">'."\n" ;
foreach ($enseignants as $enseignant) {
    echo '<option value="'.$enseignant->getId().'">'.$enseignant->getNom()." ".$enseignant->getPrenom().'</option>'."\n";
}
echo '</select>'."\n";