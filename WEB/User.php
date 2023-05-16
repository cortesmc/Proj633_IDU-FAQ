<?php

declare(strict_types=1);

class User {
    // Classe qui représente un utilisateur
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;

    public function __construct(string $nom, string $prenom, string $email, string $password) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setEmail($email);
        $this->setPassword($password);
    }

    // Assurez-vous de valider l'e-mail avant de l'attribuer
    public function setEmail(string $email): void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email format');
        }

        $this->email = $email;
    }

    // Assurez-vous de hacher le mot de passe avant de l'attribuer
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function getEmail(): string {
        return $this->email;
    }
}
