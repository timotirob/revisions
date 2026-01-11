<?php

namespace Ecole\Entity;

use DateTime;

class Etudiant {
    // On initialise le tableau vide pour éviter les erreurs si on boucle direct
    /** @var Evaluation[] */
    private array $evaluations = [];

    public function __construct(
        private int $id,
        private string $nom,
        private string $prenom,
        private DateTime $dateNaissance,
        private Filiere $filiere // Objet lié
    ) {}

    // --- Gestion des Relations ---

    public function ajouterEvaluation(Evaluation $eval): void {
        $this->evaluations[] = $eval;
    }

    /**
     * @return Evaluation[]
     */
    public function getEvaluations(): array {
        return $this->evaluations;
    }

    // --- Getters Simples ---

    public function getId(): int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function getDateNaissance(): DateTime { return $this->dateNaissance; }
    public function getFiliere(): Filiere { return $this->filiere; }
}