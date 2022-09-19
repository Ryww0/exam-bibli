<?php

namespace App\Controller;

use App\Form\FormOuvrage;
use App\Model\Ouvrage;
use App\Repository\OuvrageRepository;
use App\Service\Input;
use App\Service\Redirect;
use App\Service\View;
use App\Validator\Validation;

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

    public function addOuvrage()
    {
        if (Input::exists()) {
            var_dump($_POST);
            $val = new Validation;
            $val->name('titre')->value(Input::get('titre'))->pattern('words')->required();
            $val->name('auteur')->value(Input::get('auteur'))->pattern('words')->required();
            if ($val->isSuccess()) {
                $titre = Input::get('titre');
                $auteur = Input::get('auteur');
                $ouvrage = new Ouvrage($titre, $auteur);
                $this->ouvrageRepository->add($ouvrage);
                Redirect::to('ouvrages');
            } else {
                Redirect::to('ouvrages');
            }
        } else {
            return $this->render(
                SITE_NAME . ' - add ouvrage ',
                'pages/create.php',
                [
                    'formOuvrage' => FormOuvrage::buildAddOuvrage(),
                ]);
        }
    }
}