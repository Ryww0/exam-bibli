<?php

namespace App\Model;

class Abonne
{
    private int $id;
    private string $prenom;
    private string $nom;

    public function __construct(string $prenom, string $nom)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    public function getName(): string
    {
        return $this->nom;
    }

    public function getFirstname(): string
    {
        return $this->prenom;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName($nom): Abonne
    {
        $this->nom = $nom;
        return $this;
    }

    public function setFirstname($prenom): Abonne
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function setId($id): Abonne
    {
        $this->id = $id;
        return $this;
    }
}