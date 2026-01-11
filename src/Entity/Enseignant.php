<?php

namespace Ecole\Entity;

class Enseignant {
    public function __construct(
        private int $id,
        private string $nom,
        private string $prenom
    ) {}

    public function getId(): int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }

    public function getNomComplet(): string {
        return $this->prenom . ' ' . $this->nom;
    }
}