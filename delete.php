<?php include_once './includes/header.php';
include_once "./includes/functions.php";

try {
    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    deletePizza($_GET['id'], $db);
} catch (Exception $e) {
    echo $e->getMessage();
}
