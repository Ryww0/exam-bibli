<div class="container">
    <h1>Ouvrage infos</h1>
    <form method="post" action="<?= URL_ROOT . '/ouvrage/update/' . $ouvrage->getId() ?>">
        <input type="text" name="titre" value="<?= $ouvrage->getTitle() ?>">
        <input type="text" name="auteur" value="<?= $ouvrage->getAuthor() ?>">
        <input class="btn btn-primary" type="submit" value="Modifier l'ouvrage">
    </form>
    <a href="<?= URL_ROOT . '/ouvrages/' ?>" class="btn btn-warning">retourner à la liste des ouvrages</a>
</div>