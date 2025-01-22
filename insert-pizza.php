<?php
include_once './includes/header.php';
include_once "./includes/functions.php";

try {

    $availablePostValues = ['gusto', 'prezzo', 'disponibilita'];
    $arrKeys = checkPostFields($availablePostValues);
    [$gusto, $prezzo, $disponibilita] = $arrKeys;

    if (addPizza($gusto, $prezzo, $disponibilita, $db)) { ?>
        <h2>Pizza creata!</h2>
        <ul>
            <li>Gusto: <?= $gusto ?></li>
            <li>Prezzo: <?= $prezzo ?> €</li>
            <li>Disponibile: <?= $disponibilita == 1 ? 'Si' : 'No' ?></li>
        </ul>

<?php }
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

?>
<a class="btn btn-primary" href="add-pizza.php">
    << Torna alla pagina di creazione pizze</a>
        <a class="btn btn-primary" href="index.php">
            << Torna alla Home</a>

                <?php include_once './includes/footer.php';
