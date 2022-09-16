<?php

namespace App\Model;

class Ouvrage
{
    private int $id;
    private string $titre;
    private string $auteur;

    public function __construct(string $titre, string $auteur)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
    }

    public function getTitle(): string
    {
        return $this->titre;
    }

    public function getAuthor(): string
    {
        return $this->auteur;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setTitle($titre): Ouvrage
    {
        $this->titre = $titre;
        return $this;
    }

    public function setAuthor($auteur): Ouvrage
    {
        $this->auteur = $auteur;
        return $this;
    }

    public function setId($id): Ouvrage
    {
        $this->id = $id;
        return $this;
    }
}