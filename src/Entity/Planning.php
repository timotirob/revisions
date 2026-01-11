<?php

namespace Ecole\Entity;

class Planning {
    public function __construct(
        private int $id,
        private string $semaine, // Ex: "S42"
        private string $jour,    // Ex: "Lundi"
        private int $duree,      // en heures
        private Matiere $matiere,
        private Enseignant $enseignant,
        private Salle $salle
    ) {}

    public function getId(): int { return $this->id; }
    public function getSemaine(): string { return $this->semaine; }
    public function getJour(): string { return $this->jour; }
    public function getDuree(): int { return $this->duree; }

    // Accès aux objets liés
    public function getMatiere(): Matiere { return $this->matiere; }
    public function getEnseignant(): Enseignant { return $this->enseignant; }
    public function getSalle(): Salle { return $this->salle; }
}