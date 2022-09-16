<table class="table">
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
            <td><a class="btn btn-primary" href="<?= URL_ROOT.'/ouvrage/'.$ouvrage->getId() ?>">voir</a></td>
            <td><a class="btn btn-primary" href="<?= URL_ROOT.'/ouvrage/edit/'.$ouvrage->getId() ?>">editer</a></td>
            <td><a class="btn btn-danger" href="<?= URL_ROOT.'/ouvrage/del/'.$ouvrage->getId() ?>">supprimer</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>