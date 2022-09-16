<?php

namespace App\Repository;

use App\Model\Ouvrage;
use App\Service\Database;
use PDO;

class OuvrageRepository extends Database
{
    public function fetchAll(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM ouvrage");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetchAll();
        $stmt = null;
        $ouvrages = [];
        foreach ($arr as $ouvrage) {
            $a = new Ouvrage($ouvrage['titre'], $ouvrage['auteur']);
            $a->setId($ouvrage['id']);
            $ouvrages[] = $a;
        }
        return $ouvrages;
    }

    public function findById($params): Ouvrage
    {
        $stmt = $this->db->prepare("SELECT * FROM ouvrage WHERE id = :id");
        $stmt->bindValue(':id', $params);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        $ouvrage = new Ouvrage($arr['prenom'], $arr['nom']);
        $ouvrage->setId($arr['id']);
        return $ouvrage;
    }

    public function remove(Ouvrage $ouvrage)
    {
        $stmt = $this->db->prepare("DELETE FROM ouvrage WHERE id = :id");
        $stmt->bindValue(':id', $ouvrage->getId());
        $stmt->execute();
        $stmt = null;
    }
}