<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th colspan="2">Liste des locations en cours</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($locations as $i => $location) { ?>
            <tr>
                <td><?= $location->getNom() ?></td>
                <td><?= $location->getPrenom() ?></td>
                <td><?= $location->getTitre() ?></td>
                <td><?= $location->getAuteur() ?></td>
                <td><a class="btn btn-danger"
                       href="<?= URL_ROOT . '/location/del/' . $location->getId() ?>">supprimer</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="row col-12">
        <a class="btn btn-success" href="<?= URL_ROOT . '/locations/create/' ?>">Ajouter une location</a>
    </div>
</div>