<?php

namespace Ecole\Entity;

class Filiere {
    public function __construct(
        private int $id,
        private string $libelle, // Ex: BTS SIO
        private string $option   // Ex: SLAM
    ) {}

    public function getId(): int { return $this->id; }
    public function getLibelle(): string { return $this->libelle; }
    public function getOption(): string { return $this->option; }

    // Petit bonus pédagogique : méthode magique pour affichage rapide
    public function __toString(): string {
        return "{$this->libelle} option {$this->option}";
    }
}