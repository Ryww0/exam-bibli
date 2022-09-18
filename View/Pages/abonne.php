<div class="container">
    <h1>Abonné special</h1>
    <form method="post" action="<?= URL_ROOT . '/abonne/update/' . $abonne->getId() ?>">
        <input type="text" name="nom" value="<?= $abonne->getName() ?>">
        <input type="text" name="prenom" value="<?= $abonne->getFirstname() ?>">
        <input class="btn btn-primary" type="submit" value="Modifier l'abonné">
    </form>
    <a href="<?= URL_ROOT . '/abonnes/' ?>" class="btn btn-warning">retourner à la liste des abonnés</a>
</div>