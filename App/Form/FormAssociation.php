<?php

namespace App\Form;

use App\Repository\AbonneRepository;
use App\Service\Form;

class FormAssociation
{
    public static function buildAddLocation(array $arr, array $arr2)
    {
        $form = new Form();

        $form->debutForm('post', URL_ROOT . 'location/add/')

            ->ajoutSelect('abonne', $arr)
            ->ajoutSelect('ouvrage', $arr2)

            ->ajoutBouton('Ajouter une location', ['class' => 'btn btn-primary'])
            ->finForm();
        return $form;
    }
}