<?php

namespace App\Controller;

use App\Repository\LocationRepository;
use App\Service\Redirect;
use App\Service\View;

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
}