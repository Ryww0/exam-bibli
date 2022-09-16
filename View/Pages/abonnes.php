<table>
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
        </tr>
    <?php } ?>
    </tbody>
</table>