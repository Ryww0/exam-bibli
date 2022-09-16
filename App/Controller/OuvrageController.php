<?php

namespace App\Controller;

use App\Repository\OuvrageRepository;
use App\Service\Redirect;
use App\Service\View;

class OuvrageController
{
    use View;

    private OuvrageRepository $ouvrageRepository;

    public function __construct()
    {
        $this->ouvrageRepository = new OuvrageRepository();
    }

    public function listAllOuvrages()
    {
        $ouvrages = $this->ouvrageRepository->fetchAll();
        return $this->render(
            SITE_NAME.'- ouvrages',
            'pages/ouvrages.php',
            [
                'ouvrages' => $ouvrages,
            ]);
    }

    public function showOuvrageById(int $id)
    {
        $ouvrage = $this->ouvrageRepository->findById($id);
        return $this->render(
            SITE_NAME.'- ouvrage',
            'pages/ouvrage.php',
            [
                'ouvrage' => $ouvrage,
            ]);
    }

    public function deleteOuvrageById($id): void
    {
        $ouvrage = $this->ouvrageRepository->findById($id);
        $this->ouvrageRepository->remove($ouvrage);
        Redirect::to('/ouvrages');
    }
}