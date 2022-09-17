<?php

namespace App\Form;

use App\Model\Abonne;
use App\Service\Form;

class FormAbonne
{
    public static function buildAddAbonne()
    {
        $form = new Form();

        $form->debutForm('post', URL_ROOT . 'abonne/add/')

            ->ajoutLabelFor('nom', 'Nom')
            ->ajoutInput('text', 'nom', ['id' => 'nom', 'class' => 'form-control'])

            ->ajoutLabelFor('prenom', 'Prenom')
            ->ajoutInput('text', 'prenom', ['id' => 'prenom', 'class' => 'form-control'])

            ->ajoutBouton('Ajouter un abonné', ['class' => 'btn btn-primary'])
            ->finForm();
        return $form;
    }
}