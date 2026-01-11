<?php

namespace Ecole\Entity;

class Salle {
    public function __construct(
        private int $id,
        private string $code,         // Ex: B202
        private int $etage,           // Ex: 2
        private int $capaciteEleve,   // Ex: 30
        private int $nbPostesInfo     // Ex: 15
    ) {}

    public function getId(): int { return $this->id; }
    public function getCode(): string { return $this->code; }
    public function getEtage(): int { return $this->etage; }
    public function getCapaciteEleve(): int { return $this->capaciteEleve; }
    public function getNbPostesInfo(): int { return $this->nbPostesInfo; }
}