<?php

namespace App\Controller;

use App\Repository\AbonneRepository;
use App\Service\Redirect;
use App\Service\View;

class AbonneController
{
    use View;

    private AbonneRepository $abonneRepository;

    public function __construct()
    {
        $this->abonneRepository = new AbonneRepository();
    }

    public function listAllAbonnes()
    {
        $abonnes = $this->abonneRepository->fetchAll();
        return $this->render(
            SITE_NAME.'- abonnes',
            'pages/abonnes.php',
            [
                    'abonnes' => $abonnes,
            ]);
    }

    public function showAbonneById(int $id)
    {
        $abonne = $this->abonneRepository->findById($id);
        return $this->render(
            SITE_NAME.'- abonne',
            'pages/abonne.php',
            [
                'abonne' => $abonne,
            ]);
    }

    public function deleteAbonneById($id): void
    {
        $abonne = $this->abonneRepository->findById($id);
        $this->abonneRepository->remove($abonne);
        Redirect::to('/abonnes');
    }
}