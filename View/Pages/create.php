<div class="container">
    <div class="row">
        <div class="col-6">
            <?php
            if (isset($formAbonne)) {
                echo $formAbonne->create();
            } elseif (isset($formOuvrage)) {
                echo $formOuvrage->create();
            }
            ?>
        </div>
        <div class="col-6">
            <?php if (isset($formAbonne)) { ?>
                <a class="btn btn-warning" href="<?= URL_ROOT . '/abonnes/' ?>">retouner à la liste des abonnés</a>
            <?php } elseif (isset($formOuvrage)) { ?>
                <a class="btn btn-warning" href="<?= URL_ROOT . '/ouvrages/' ?>">retouner à la liste des ouvrages</a>
            <?php } ?>
        </div>
    </div>

</div>
