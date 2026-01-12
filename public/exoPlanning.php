<?php

use Ecole\Entity\Matiere;
use Ecole\Entity\Enseignant;
use Ecole\Entity\Salle;
use Ecole\Entity\Planning;

// =================================================================
// 1. CRÉATION DU RÉFÉRENTIEL (Données de base)
// =================================================================

// --- Salles (Mixte : avec et sans PC) ---
$salleB202 = new Salle(1, "B202", 2, 24, 24); // Salle info
$salleA101 = new Salle(2, "A101", 1, 30, 1);  // Salle cours (1 PC prof)
$salleC004 = new Salle(3, "C004", 0, 15, 0);  // Petite salle réunion
$amphi     = new Salle(4, "Amphi", 0, 100, 0);// Grand Amphi
$laboRes   = new Salle(5, "Labo", 1, 12, 12); // Labo réseau

// On regroupe pour l'exercice 5
$salles = [$salleB202, $salleA101, $salleC004, $amphi, $laboRes];


// --- Matières ---
$matWeb   = new Matiere(100, "Développement Web", "Bloc 1");
$matCyber = new Matiere(101, "Cybersécurité", "Bloc 3");
$matSisr  = new Matiere(102, "Infra. Réseau", "Bloc 2");
$matAlgo  = new Matiere(103, "Algorithmique", "Bloc 1");
$matCult  = new Matiere(104, "Culture Générale", "Hors Bloc");
$matAngl  = new Matiere(105, "Anglais Technique", "Hors Bloc");


// --- Enseignants ---
$profTuring   = new Enseignant(1, "Turing", "Alan");
$profLovelace = new Enseignant(2, "Lovelace", "Ada");
$profHopper   = new Enseignant(3, "Hopper", "Grace");
$profSnowden  = new Enseignant(4, "Snowden", "Edward");
$profHamilton = new Enseignant(5, "Hamilton", "Margaret");

// Pour l'exercice 10 (Liste déroulante)
$enseignants = [$profTuring, $profLovelace, $profHopper, $profSnowden, $profHamilton];


// =================================================================
// 2. GÉNÉRATION DU PLANNING (Jeu de données)
// =================================================================

$plannings = [];
$id = 1;

// --- SEMAINE S41 (Semaine passée - bruit pour les filtres) ---
$plannings[] = new Planning($id++, "S41", "Lundi", 2, $matWeb, $profTuring, $salleB202);
$plannings[] = new Planning($id++, "S41", "Lundi", 2, $matAlgo, $profTuring, $salleA101);
$plannings[] = new Planning($id++, "S41", "Mardi", 4, $matSisr, $profSnowden, $laboRes);
$plannings[] = new Planning($id++, "S41", "Jeudi", 2, $matCult, $profHamilton, $amphi);


// --- SEMAINE S42 (Semaine cible pour les exercices) ---
// Total attendu Turing S42 : 4h (Lun) + 2h (Mer) = 6h
// Total attendu Lovelace S42 : 3h (Mar) + 4h (Ven) = 7h
// Total attendu Snowden S42 : 4h (Jeu) = 4h
// Total Heures S42 = 2 + 2 + 3 + 2 + 4 + 4 = 17 heures

// Lundi S42
$plannings[] = new Planning($id++, "S42", "Lundi", 2, $matWeb, $profTuring, $salleB202);
$plannings[] = new Planning($id++, "S42", "Lundi", 2, $matAlgo, $profTuring, $salleB202); // Turing enchaîne

// Mardi S42
$plannings[] = new Planning($id++, "S42", "Mardi", 3, $matCyber, $profLovelace, $laboRes);
$plannings[] = new Planning($id++, "S42", "Mardi", 1, $matAngl, $profHopper, $salleA101); // Petit cours d'1h

// Mercredi S42
$plannings[] = new Planning($id++, "S42", "Mercredi", 2, $matWeb, $profTuring, $salleB202); // Encore Turing

// Jeudi S42
$plannings[] = new Planning($id++, "S42", "Jeudi", 4, $matSisr, $profSnowden, $laboRes); // Grosse session réseau

// Vendredi S42
$plannings[] = new Planning($id++, "S42", "Vendredi", 4, $matCyber, $profLovelace, $salleB202); // Lovelace finit la semaine


// --- SEMAINE S43 (Semaine future - bruit pour les filtres) ---
$plannings[] = new Planning($id++, "S43", "Lundi", 4, $matCyber, $profLovelace, $salleB202);
$plannings[] = new Planning($id++, "S43", "Mardi", 2, $matCult, $profHamilton, $amphi);
$plannings[] = new Planning($id++, "S43", "Mardi", 2, $matAngl, $profHopper, $salleA101);
$plannings[] = new Planning($id++, "S43", "Mercredi", 8, $matSisr, $profSnowden, $laboRes); // Hackathon réseau 8h !
$plannings[] = new Planning($id++, "S43", "Jeudi", 2, $matAlgo, $profTuring, $salleB202);