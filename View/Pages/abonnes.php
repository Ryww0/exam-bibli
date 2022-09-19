<div class="container">
    <table class="table row">
        <thead>
        <tr>
            <th colspan="2">Liste des abonnés (<?= $count['nbAbonnes'] ?>)</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($abonnes as $i => $abonne) { ?>
            <tr>
                <td><?= $abonne->getName() ?></td>
                <td><?= $abonne->getFirstname() ?></td>
                <td><a class="btn btn-primary" href="<?= URL_ROOT . '/abonne/' . $abonne->getId() ?>">voir</a></td>
                <td><a class="btn btn-danger" href="<?= URL_ROOT . '/abonne/del/' . $abonne->getId() ?>">supprimer</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="row col-12">
        <a class="btn btn-success" href="<?= URL_ROOT . '/abonnes/create/' ?>">Ajouter un abonné</a>
    </div>
</div>
