<?php

namespace App\Repository;

use App\Model\Location;
use App\Service\Database;
use PDO;

class LocationRepository extends Database
{
    public function fetchAll(): array
    {
        $stmt = $this->db->prepare("SELECT association_abonne_ouvrage.id, association_abonne_ouvrage.id_abonne, association_abonne_ouvrage.id_ouvrage , abonne.nom, abonne.prenom, ouvrage.titre, ouvrage.auteur FROM association_abonne_ouvrage JOIN abonne ON association_abonne_ouvrage.id_abonne = abonne.id JOIN ouvrage ON association_abonne_ouvrage.id_ouvrage = ouvrage.id");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetchAll();
        $stmt = null;
        $locations = [];
        foreach ($arr as $location) {
            $a = new Location($location['id_abonne'], $location['id_ouvrage']);
            $a->setId($location['id']);
            $a->setNom($location['nom']);
            $a->setPrenom($location['prenom']);
            $a->setTitre($location['titre']);
            $a->setAuteur($location['auteur']);
            $locations[] = $a;
        }
        return $locations;
    }

    public function findById($params): Location
    {
        $stmt = $this->db->prepare("SELECT * FROM association_abonne_ouvrage WHERE id = :id");
        $stmt->bindValue(':id', $params);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        $location = new Location($arr['id_abonne'], $arr['id_ouvrage']);
        $location->setId($arr['id']);
        return $location;
    }

    public function remove(Location $location)
    {
        $stmt = $this->db->prepare("DELETE FROM association_abonne_ouvrage WHERE id = :id");
        $stmt->bindValue(':id', $location->getId());
        $stmt->execute();
        $stmt = null;
    }

    public function add(Location $location): Location
    {
        $stmt = $this->db->prepare("INSERT INTO association_abonne_ouvrage (id_abonne, id_ouvrage) VALUES (:idAbo, :idOuv)");
        $stmt->bindValue(':idAbo', $location->getIdAbo());
        $stmt->bindValue(':idOuv', $location->getIdOuv());
        $stmt->execute();
        $stmt = null;
        return $this->findById($this->db->lastInsertId());
    }
}