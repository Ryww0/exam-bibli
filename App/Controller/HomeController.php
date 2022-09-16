<?php

namespace App\Controller;

use App\Service\View;

class HomeController
{
    use View;

    public function invoke()
    {
        return $this->render(
            SITE_NAME.'- home',
            'pages/homepage.php');
    }

}