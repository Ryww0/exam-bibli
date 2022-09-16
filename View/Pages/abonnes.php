<table class="table">
    <thead>
    <tr>
        <th colspan="2">Liste des abonnés</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($abonnes as $i => $abonne) { ?>
        <tr>
            <td><?= $abonne->getName() ?></td>
            <td><?= $abonne->getFirstname() ?></td>
            <td><a class="btn btn-primary" href="<?= URL_ROOT.'/abonne/'.$abonne->getId() ?>">voir</a></td>
            <td><a class="btn btn-primary" href="<?= URL_ROOT.'/abonne/edit/'.$abonne->getId() ?>">editer</a></td>
            <td><a class="btn btn-danger" href="<?= URL_ROOT.'/abonne/del/'.$abonne->getId() ?>">supprimer</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>