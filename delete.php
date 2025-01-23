<?php include_once './includes/header.php';
include_once "./includes/functions.php";

try {
    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    if (deletePizza($_GET['id'], $db)) {

        header("Location: index.php?message=Pizza eliminata");
    } else {
        echo $query->errorInfo();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
