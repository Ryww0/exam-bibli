<?php

namespace App\Controller;

use App\Form\FormAssociation;
use App\Model\Location;
use App\Repository\AbonneRepository;
use App\Repository\LocationRepository;
use App\Repository\OuvrageRepository;
use App\Service\Input;
use App\Service\Redirect;
use App\Service\View;
use App\Validator\Validation;

class LocationController
{
    use View;

    private LocationRepository $locationRepository;

    public function __construct()
    {
        $this->locationRepository = new LocationRepository();
    }

    public function listAllLocation()
    {
        $locations = $this->locationRepository->fetchAll();
        return $this->render(
            SITE_NAME.'- locations',
            'pages/locations.php',
            [
                'locations' => $locations,
            ]);
    }

    public function deleteLocationById($id): void
    {
        $location = $this->locationRepository->findById($id);
        $this->locationRepository->remove($location);
        Redirect::to('/locations');
    }

    public function addLocation()
    {
        $aboRepository = new AbonneRepository();
        $arr = [];
        foreach ($aboRepository->fetchAll() as $key => $value) {
            $arr[$value->getId()] = $value->getName().' '.$value->getFirstname();
        }

        $ouvRepository = new OuvrageRepository();
        $arr2 = [];
        foreach ($ouvRepository->fetchAll() as $key => $value) {
            $arr2[$value->getId()] = $value->getTitle();
        }

        if (Input::exists()) {
            $val = new Validation;
//            $val->name('titre')->value(Input::get('titre'))->pattern('words')->required();
//            $val->name('auteur')->value(Input::get('auteur'))->pattern('words')->required();
            if ($val->isSuccess()) {
                $idAbo = Input::get('abonne');
                $idOuv = Input::get('ouvrage');
                $location = new Location((int) $idAbo, (int) $idOuv);
                $this->locationRepository->add($location);
                Redirect::to('locations');
            } else {
                Redirect::to('locations');
            }
        } else {
            return $this->render(
                SITE_NAME . ' - add location ',
                'pages/create.php',
                [
                    'formLocation' => FormAssociation::buildAddLocation($arr, $arr2),
                ]);
        }
    }
}