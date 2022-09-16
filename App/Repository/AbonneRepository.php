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
}