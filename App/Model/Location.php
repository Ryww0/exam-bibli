<?php

namespace App\Model;

class Location
{
    private int $id;
    private int $id_abo;
    private int $id_ouv;
    private string $nom;
    private string $prenom;
    private string $titre;
    private string $auteur;

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * @param string $auteur
     */
    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }

    public function __construct($id_abo, $id_ouv)
    {
        $this->id_abo = $id_abo;
        $this->id_ouv = $id_ouv;
    }

    /**
     * @return int
     */
    public function getIdAbo(): int
    {
        return $this->id_abo;
    }

    /**
     * @param int $id_abo
     */
    public function setIdAbo(int $id_abo): void
    {
        $this->id_abo = $id_abo;
    }

    /**
     * @return int
     */
    public function getIdOuv(): int
    {
        return $this->id_ouv;
    }

    /**
     * @param int $id_ouv
     */
    public function setIdOuv(int $id_ouv): void
    {
        $this->id_ouv = $id_ouv;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}