<?php include_once './includes/header.php';
include_once "./includes/functions.php";

try {

    $availablePostValues = ['id', 'gusto', 'prezzo', 'disponibilita'];

    $arrKeys = checkPostFields($availablePostValues);

    [$id, $gusto, $prezzo, $disponibilita] = $arrKeys;

    updatePizza($id, $gusto, $prezzo, $disponibilita, $db);
} catch (Exception $e) {
    echo $e->getMessage();
}
