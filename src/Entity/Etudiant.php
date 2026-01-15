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

    public function calculVraieMoyenne($matiere=""): float {
        $totalPoints = 0;
        $totalCoefs = 0;
        foreach ($this->getEvaluations() as $eval) {
            // Votre logique de cumul ici
            if ($matiere == $eval->getMatiere()->getCodeBloc() || $matiere=="") {
                $totalPoints = $totalPoints + $eval->getCoefficient() * $eval->getNote();
                $totalCoefs = $totalCoefs + $eval->getCoefficient();
            }
        }
        if ($totalCoefs > 0)
            return $totalPoints / $totalCoefs;
        else return -1 ;
    }

    /*public function calculVraieMoyenneParMatiere($matiere): float {
        $totalPoints = 0;
        $totalCoefs = 0;
        foreach ($this->getEvaluations() as $eval) {
            // Votre logique de cumul ici
            if ($matiere == $eval->getMatiere()->getCodeBloc()) {
                $totalPoints = $totalPoints + $eval->getCoefficient() * $eval->getNote();
                $totalCoefs = $totalCoefs + $eval->getCoefficient();
            }
        }
        if ($totalCoefs > 0)
            return $totalPoints / $totalCoefs;
        else return -1 ;
    }*/


    // --- Getters Simples ---

    public function getId(): int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function getDateNaissance(): DateTime { return $this->dateNaissance; }
    public function getFiliere(): Filiere { return $this->filiere; }
}