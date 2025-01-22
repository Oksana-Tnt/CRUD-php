<?php include_once './includes/header.php';
include_once "./includes/functions.php";
?>

<main>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success">
            <?= $_GET['message'] ?>
        </div>
    <?php endif; ?>

    <?php
    $rows = getAllPizza($db);
    ?>

    <table class="table">

        <thead>
            <tr>
                <th>#</th>
                <th>Gusto</th>
                <th>Prezzo</th>
                <th>Disponibile?</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $pizza):
                [
                    'id' => $id,
                    'gusto' => $gusto,
                    'prezzo' => $prezzo,
                    'disponibilita' => $disponibilita
                ] = $pizza;
            ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $gusto ?></td>
                    <td><?= $prezzo ?></td>
                    <td><?= $disponibilita == 1 ? 'Si' : 'No' ?></td>
                    <td>
                        <a class="btn btn-warning" href="edit-pizza.php?id=<?= $id ?>">Modifica</a>
                        <a class="btn btn-danger" href="delete.php?id=<?= $id ?>">Elimina</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>





</main>

<?php include_once './includes/footer.php'; ?>