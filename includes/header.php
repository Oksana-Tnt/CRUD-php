<?php require_once __DIR__ . '/connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'header-deps.php' ?>
</head>

<body>

    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Lista pizze</a></li>
            <li class="nav-item"><a href="add-pizza.php" class="nav-link">Crea pizza</a></li>
        </ul>
    </header>