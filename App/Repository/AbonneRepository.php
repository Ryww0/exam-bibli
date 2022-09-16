<?php

namespace App\Repository;

use App\Model\Abonne;
use App\Service\Database;
use PDO;

class AbonneRepository extends Database
{
    public function fetchAll(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM abonne");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetchAll();
        $stmt = null;
        $abonnes = [];
        foreach ($arr as $abonne) {
            $a = new Abonne($abonne['prenom'], $abonne['nom']);
            $a->setId($abonne['id']);
            $abonnes[] = $a;
        }
        return $abonnes;
    }

    public function findById($params): Abonne
    {
        $stmt = $this->db->prepare("SELECT * FROM abonne WHERE id = :id");
        $stmt->bindValue(':id', $params);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        $abonne = new Abonne($arr['prenom'], $arr['nom']);
        $abonne->setId($arr['id']);
        return $abonne;
    }

    public function remove(Abonne $abonne)
    {
        $stmt = $this->db->prepare("DELETE FROM abonne WHERE id = :id");
        $stmt->bindValue(':id', $abonne->getId());
        $stmt->execute();
        $stmt = null;
    }
}