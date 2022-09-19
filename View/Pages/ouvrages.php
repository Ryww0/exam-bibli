<div class="container">
    <table class="table row">
        <thead>
        <tr>
            <th colspan="2">Liste des ouvrages</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($ouvrages as $i => $ouvrage) { ?>
            <tr>
                <td><strong><?= $ouvrage->getTitle() ?></strong></td>
                <td>Par : <?= $ouvrage->getAuthor() ?></td>
                <td><a class="btn btn-primary" href="<?= URL_ROOT . '/ouvrage/' . $ouvrage->getId() ?>">voir</a></td>
                <td><a class="btn btn-danger" href="<?= URL_ROOT . '/ouvrage/del/' . $ouvrage->getId() ?>">supprimer</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="row col-12">
        <a class="btn btn-success" href="<?= URL_ROOT . '/ouvrages/create/' ?>">Ajouter un ouvrage</a>
    </div>
</div>