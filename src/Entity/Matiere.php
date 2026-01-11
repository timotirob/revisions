<?php

namespace Ecole\Entity;

class Matiere {
    public function __construct(
        private int $id,
        private string $libelle,  // Ex: Développement Web
        private string $codeBloc  // Ex: Bloc 1
    ) {}

    public function getId(): int { return $this->id; }
    public function getLibelle(): string { return $this->libelle; }
    public function getCodeBloc(): string { return $this->codeBloc; }
}