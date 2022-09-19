<?php

namespace App\Form;

use App\Service\Form;

class FormOuvrage
{
    public static function buildAddOuvrage()
    {
        $form = new Form();

        $form->debutForm('post', URL_ROOT . 'ouvrage/add/')

            ->ajoutLabelFor('titre', 'Titre de l\'ouvrage')
            ->ajoutInput('text', 'titre', ['id' => 'titre', 'class' => 'form-control'])

            ->ajoutLabelFor('auteur', 'Auteur de l\'oeuvre')
            ->ajoutInput('text', 'auteur', ['id' => 'auteur', 'class' => 'form-control'])

            ->ajoutBouton('Ajouter un ouvrage', ['class' => 'btn btn-primary'])
            ->finForm();
        return $form;
    }
}