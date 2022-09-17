<div class="container">
    <h1>Abonné special</h1>
    <h2><?= $abonne->getName() ?></h2>
    <h2><?= $abonne->getFirstname() ?></h2>
    <a href="<?= URL_ROOT . '/abonnes/' ?>" class="btn btn-warning">retourner à la liste des abonnés</a>
</div>