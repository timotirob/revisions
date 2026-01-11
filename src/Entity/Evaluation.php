<?php

namespace Ecole\Entity;

use DateTime;

class Evaluation {
    public function __construct(
        private int $id,
        private float $note,
        private int $coefficient,
        private string $type,        // DST, DM, Oral
        private Matiere $matiere,    // Objet lié
        private Enseignant $enseignant, // Objet lié
        private DateTime $dateEval
    ) {}

    public function getId(): int { return $this->id; }
    public function getNote(): float { return $this->note; }
    public function getCoefficient(): int { return $this->coefficient; }
    public function getType(): string { return $this->type; }
    public function getMatiere(): Matiere { return $this->matiere; }
    public function getEnseignant(): Enseignant { return $this->enseignant; }
    public function getDateEval(): DateTime { return $this->dateEval; }
}