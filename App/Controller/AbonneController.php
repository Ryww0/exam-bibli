<?php

namespace App\Controller;

use App\Form\FormAbonne;
use App\Model\Abonne;
use App\Repository\AbonneRepository;
use App\Service\Input;
use App\Service\Redirect;
use App\Service\View;
use App\Validator\Validation;

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
            SITE_NAME . '- abonnes',
            'pages/abonnes.php',
            [
                'abonnes' => $abonnes,
                'count' => $this->abonneRepository->count()
            ]);
    }

    public function showAbonneById(int $id)
    {
        $abonne = $this->abonneRepository->findById($id);
        return $this->render(
            SITE_NAME . '- abonne',
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

    public function addAbonne()
    {
        if (Input::exists()) {
            var_dump($_POST);
            $val = new Validation;
            $val->name('nom')->value(Input::get('nom'))->pattern('alpha')->required();
            $val->name('prenom')->value(Input::get('prenom'))->pattern('alpha')->required();
            if ($val->isSuccess()) {
                $prenom = Input::get('prenom');
                $nom = Input::get('nom');
                $abonne = new Abonne($prenom, $nom);
                $this->abonneRepository->add($abonne);
                Redirect::to('abonnes');
            } else {
                Redirect::to('abonnes');
            }
        } else {
            return $this->render(
                SITE_NAME . ' - add abonnes: ',
                'pages/create.php',
                [
                    'formAbonne' => FormAbonne::buildAddAbonne(),
                ]);
        }
    }

    public function updateAbonneById($id)
    {
        if (Input::exists()) {
            $val = new Validation;
            $val->name('nom')->value(Input::get('nom'))->pattern('alpha')->required();
            $val->name('prenom')->value(Input::get('prenom'))->pattern('alpha')->required();
            if ($val->isSuccess()) {
                $prenom = Input::get('prenom');
                $nom = Input::get('nom');
                var_dump($id);
                var_dump($prenom);
                var_dump($nom);
                $abonne = new Abonne($prenom, $nom);
                $abonne->setId($id);
                $this->abonneRepository->update($abonne);
                Redirect::to('abonnes');
            } else {
                Redirect::to('abonnes');
            }
        }
    }
}