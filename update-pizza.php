<?php include_once './includes/header.php';
include_once "./includes/functions.php";

try {

    $availablePostValues = ['id', 'gusto', 'prezzo', 'disponibilita'];

    $arrKeys = checkPostFields($availablePostValues);

    [$id, $gusto, $prezzo, $disponibilita] = $arrKeys;

    if (updatePizza($id, $gusto, $prezzo, $disponibilita, $db)) {
        header("Location: index.php?message=Pizza Modificata con successo!");
    } else {
        echo $query->errorInfo();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
